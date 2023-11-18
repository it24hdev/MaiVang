<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\Permission;
use App\Admin\Models\Role;
use App\Admin\Services\Interfaces\RoleServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleService extends BaseService implements RoleServiceInterface
{
    public function index($request){
        $keywords = $request->search;
        $roles =  Role::where(function ($query) use ($keywords) {
            if (!empty($keywords)) {
                $query->where('roles.name', 'like', '%' . $keywords . '%');
            }
        })->paginate(Common::page_limit(),['*'],'active');
        $rolesTrashed = Role::onlyTrashed()->paginate(Common::page_limit(),['*'],'disable');
        $permissionParents = Permission::where('parent_id', 0)->get();
        return view('admin.content.role.index',compact('roles','rolesTrashed','permissionParents'));
    }

    public function create(){
        $permissionParents = Permission::where('parent_id', 0)->get();
        return view('admin.content.role.create',compact('permissionParents'));
    }

    public function edit($request){
        $role = Role::find($request->id);
        $permissionParents = Permission::where('parent_id', 0)->get();
        return view('admin.content.role.edit',[
            'role' => $role,
            'permissionParents' => $permissionParents,
        ]);
    }

    public function store($request)
    {
        $input = [
            'name' => $request->name,
            'describe' => $request->describe,
        ];
        try {
            DB::beginTransaction();
            $role = Role::create($input);
            $role->permissions()->attach($request->permissions);
            DB::commit();
            return redirect()->route('admin.roles.index')->with('success', 'Thêm mới thành công!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.roles.index')->with('error', 'Có lỗi xảy ra!');
        }
    }

    public function update($request)
    {
        try {
            $input = [
                'name' => $request->name,
                'describe' => $request->describe,
            ];
            $role = Role::find($request->id);
            DB::beginTransaction();
            $role->update($input);
            $role->permissions()->sync($request->permissions);
            DB::commit();
            return redirect()->route('admin.roles.index')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $exception) {
            DB::commit();
            return redirect()->route('admin.roles.index')->with('error', 'Có lỗi xảy ra!');
        }
    }

    public function restore($request)
    {
        try {
            $roleTrashed = Role::withTrashed()->find($request->id);
            DB::beginTransaction();
            $roleTrashed->restore();
            DB::commit();
            return response()->json(['success' => true,'role' => $roleTrashed]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $role = Role::withTrashed()->find($request->id);
            DB::beginTransaction();
            $role->permissions()->detach();
            $role->users()->detach();
            $role->delete();
            DB::commit();
            return response()->json(['success' => true,'role' => $role]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function destroys($request)
    {
        try {
            $roles = Role::whereIn('id', $request->arr)->get();
            DB::beginTransaction();
            foreach ($roles as $role){
                $role->permissions()->detach();
                $role->users()->detach();
                $role->delete();
            }
            DB::commit();
            return response()->json(['success' => true,'roles' => $roles]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['success' => false]);
        }
    }

    public function show($request)
    {
        $permission = [];
        $role = Role::withTrashed()->find($request->id);
        foreach ($role->permissions as $item) {
            array_push($permission, $item->id);
        }
        return response()->json([
            'success' => true,
            'PermissionRoleRelationships' => $permission
        ]);
    }
}

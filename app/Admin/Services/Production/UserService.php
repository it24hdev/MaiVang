<?php

namespace App\Admin\Services\Production;

use App\Admin\Models\Role;
use App\Admin\Models\User;
use App\Admin\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Admin\Http\Helpers\Common;

class UserService extends BaseService implements UserServiceInterface
{
    public function index($request){
        $search = $request->search;
        $sort_by = $request->sort_by;
        $limit = $request->limit;
        $role = $request->role;
        if($search.$sort_by.$limit.$role){
            $users = User::where(function ($query) use ($search) {
                if ($search) {
                    $query->orwhere('users.name', 'like', '%' . $search . '%');
                    $query->orwhere('users.email', 'like', '%' . $search . '%');
                }
            })
                ->where(function ($query) use ($role){
                    if($role){
                        $users_id = Role::find($role)->users->pluck('id')->all();
                        $query->whereIn('id',$users_id);
                    }
                })
                ->where(function ($query) use ($sort_by){
                    if($sort_by == 'admin'){
                        $query->where('is_admin',1);
                    }
                    if($sort_by == 'user'){
                        $query->where('is_admin',0);
                    }
                })
                ->paginate($limit ?? Common::page_limit(),['*'],'active');
        }
        else{
            $users = User::paginate(Common::page_limit(),['*'],'active');
        }
        $usersTrashed = User::onlyTrashed()->paginate(Common::page_limit(),['*'],'disable');
        $roles = Role::get();
        return view('admin.content.users.index', compact('users', 'usersTrashed','roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.content.users.create', ['roles' => $roles]);
    }

    public function store($request)
    {
        $birthday = null;
        if (!empty($request->yearbirthday)) {
            $birthday = date("Y-m-d H:i:s", mktime(0, 0, 0, $request->daybirthday, $request->monthbirthday, $request->yearbirthday));
        }
        $nameImage = User::noImage;
        if ($request->image) {
            $nameImage = Common::imageName('users', $request->name, $request->image->extension());
        }
        try {
            $input = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $birthday,
                'image' => $nameImage,
                'password' => Hash::make($request->name),
                'gender' => $request->gender,
                'last_login_ip' => \Request::ip(),
            ];
            /** Kiểm tra tại khoản hiện tại có phải admin không*/
            if (Auth::user()->is_admin == 1) {
                $input['is_admin'] = $request->has('is_admin');
            }
            DB::beginTransaction();
            $user = User::create($input);
            if (Auth::user()->is_admin == 1) {
                $user->roles()->attach($request->roles);
            }
            DB::commit();
            if ($request->image) {
                Common::uploadImage($request->image, $nameImage, public_path('media\users'));
            }
            return redirect()->route('admin.users.index')->with('success', 'Thêm mới thành công!');
        } catch (\Exception $exception) {
            DB::commit();
            return redirect()->route('admin.users.index')->with('error', 'Có lỗi xảy ra!');
        }
    }

    public function edit($request)
    {
        try {
            if (Auth::user()->is_admin == 1 || Auth::id() == $request->id) {
                $user = User::find($request->id);
                $roles = Role::all();
                $UserRoleRelationships = $user->roles->pluck('id')->all();
            }
            return view('admin.content.users.edit', [
                'user' => $user,
                'roles' => $roles,
                'UserRoleRelationships' => $UserRoleRelationships
            ]);
        }catch (\Exception $exception){
            abort(403);
        }
    }

    public function update($request)
    {
        if (Auth::user()->is_admin == 1 || Auth::id() == $request->id) {
            $user = User::find($request->id);
            $birthday = null;
            if (!empty($request->yearbirthday)) {
                $birthday = date("Y-m-d H:i:s", mktime(0, 0, 0, $request->daybirthday, $request->monthbirthday, $request->yearbirthday));
            }
            $nameImage = $nameOldImage = User::noImage;
            if ($user->image != User::noImage) {
                $nameImage = $nameOldImage = $user->image;
            }
            if ($request->image) {
                $nameImage = Common::imageName('users', $request->name, $request->image->extension());
            }
            try {
                $input = [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'birthday' => $birthday,
                    'image' => $nameImage,
                    'gender' => $request->gender,
                    'last_login_ip' => \Request::ip(),
                ];
                /* Kiểm tra tại khoản hiện tại có phải admin không*/
                if (Auth::user()->is_admin == 1) {
                    $input['is_admin'] = $request->has('is_admin');
                }
                DB::beginTransaction();
                $user->update($input);
                if (Auth::user()->is_admin == 1) {
                    $user->roles()->sync($request->roles);
                }
                DB::commit();
                if ($request->image) {
                    Common::uploadImage($request->image, $nameImage, public_path('media\users'));
                    Common::deleteImage($nameOldImage, public_path('media\users'));
                }
                return redirect()->route('admin.users.index')->with('success', 'Cập nhật thành công!');
            } catch (\Exception $exception) {
                DB::commit();
                return redirect()->route('admin.users.index')->with('error', 'Có lỗi xảy ra!');
            }
        } else {
            abort(403);
        }
    }

    public function restore($request)
    {
        try {
            $user = User::withTrashed()->find($request->id);
            $user->restore();
            return response()->json(['success' => true,'user' => $user]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        if($request->id != Auth::id()) {
            try {
                $user = User::find($request->id);
                DB::beginTransaction();
                $user->roles()->detach();
                $user->delete();
                DB::commit();
                return response()->json(['success' => true, 'user' => $user]);
            } catch (\Exception $exception) {
                return response()->json(['success' => false]);
            }
        }else{
            return response()->json(['success' => false]);
        }
    }

    public function destroys($request)
    {
        try {
            $users = User::whereIn('id', $request->arr)->where('id','<>',Auth::id())->get();
            DB::beginTransaction();
            foreach ($users as $user){
                $user->roles()->detach();
                $user->delete();
            }
            DB::commit();
            return response()->json(['success' => true,'users' => $users]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

}

<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Models\Role;
use Illuminate\Http\Request;
use App\Admin\Services\Interfaces\RoleServiceInterface;
use App\Admin\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'system']);return $next($request);});
        $this->roleService = $roleService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Role::class);
        return $this->roleService->index($request);
    }

    public function create()
    {
        $this->authorize('create', Role::class);
        return $this->roleService->create();
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('create', Role::class);
        return $this->roleService->store($request);
    }

    public function show(Request $request)
    {
        $this->authorize('view', Role::class);
        return $this->roleService->show($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', Role::class);
        return $this->roleService->edit($request);
    }

    public function update(RoleRequest $request)
    {
        $this->authorize('update', Role::class);
        return $this->roleService->update($request);
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', Role::class);
        return $this->roleService->destroy($request);
    }

    public function destroys(Request $request){
        $this->authorize('delete', Role::class);
        return $this->roleService->destroys($request);

    }

    public function restore(Request $request)
    {
        $this->authorize('restore', Role::class);
        return $this->roleService->restore($request);
    }
}

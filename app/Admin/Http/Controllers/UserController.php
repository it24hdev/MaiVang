<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Helpers\Common;
use App\Admin\Http\Requests\UserRequest;
use App\Admin\Models\PaymentMethod;
use App\Admin\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use App\Admin\Models\User;
use Illuminate\Support\Facades\Auth;
use function Termwind\raw;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'system']);return $next($request);});
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        return $this->userService->index($request);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return $this->userService->create();
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);
        return $this->userService->store($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('view', User::class);
        return $this->userService->edit($request);
    }

    public function update(UserRequest $request)
    {
        $this->authorize('update', User::class);
        return $this->userService->update($request);
    }

    public function restore(Request $request)
    {
        $this->authorize('restore', User::class);
        return $this->userService->restore($request);
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', User::class);
        return $this->userService->destroy($request);
    }

    public function destroys(Request $request)
    {
        $this->authorize('delete', User::class);
        return $this->userService->destroys($request);
    }
}

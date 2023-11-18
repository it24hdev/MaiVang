<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\MenuItemRequest;
use App\Admin\Http\Requests\MenuRequest;
use App\Admin\Models\Menu;
use App\Admin\Services\Interfaces\MenuServiceInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menusService;

    public function __construct(MenuServiceInterface $menusService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'setting']);return $next($request);});
        $this->menusService = $menusService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Menu::class);
        return $this->menusService->index($request);
    }

    public function update(Request $request){
        $this->authorize('update', Menu::class);
        return $this->menusService->update($request);
    }

    public function storeItem(MenuItemRequest $request){
        $this->authorize('create', Menu::class);
        return $this->menusService->storeItem($request);
    }

    public function storeMenu(MenuRequest $request){
        $this->authorize('create', Menu::class);
        return $this->menusService->storeMenu($request);
    }

    public function destroyMenu(Request $request){
        $this->authorize('delete', Menu::class);
        return $this->menusService->destroyMenu($request);
    }

    public function position(Request $request){
        $this->authorize('update', Menu::class);
        return $this->menusService->position($request);
    }
}

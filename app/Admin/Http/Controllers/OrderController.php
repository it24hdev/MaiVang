<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\OrderRequest;
use App\Admin\Models\Order;
use App\Admin\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $ordersService;

    public function __construct(OrderServiceInterface $ordersService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {session(['menu' => 'sell']);return $next($request);});
        $this->ordersService = $ordersService;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Order::class);
        return $this->ordersService->index($request);
    }

    public function create(){
        $this->authorize('create', Order::class);
        return $this->ordersService->create();
    }

    public function store(OrderRequest $request)
    {
        $this->authorize('create', Order::class);
        return $this->ordersService->store($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', Order::class);
        return $this->ordersService->edit($request);
    }

    public function update(OrderRequest $request)
    {
        $this->authorize('update', Order::class);
        return $this->ordersService->update($request);
    }

    public function view(Request $request)
    {
        $this->authorize('view', Order::class);
        return $this->ordersService->view($request);
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', Order::class);
        return $this->ordersService->destroy($request);
    }

    public function loadProduct(Request $request)
    {
        return $this->ordersService->loadProduct($request);
    }
    public function loadDistrict(Request $request)
    {
        return $this->ordersService->loadDistrict($request);
    }
    public function redirectCreated()
    {
        return $this->ordersService->redirectCreated();
    }
    public function redirectUpdated()
    {
        return $this->ordersService->redirectUpdated();
    }
}

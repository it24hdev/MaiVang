<?php

namespace App\Admin\Http\Controllers;

use App\Admin\Http\Requests\CustomerRequest;
use App\Admin\Models\Customer;
use App\Admin\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customersService;

    public function __construct(CustomerServiceInterface $customersService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) { session(['menu' => 'sell']); return $next($request);});
        $this->customersService = $customersService;
    }
    public function index(Request $request)
    {
        $this->authorize('viewAny', Customer::class);
        return $this->customersService->index($request);
    }

    public function store(CustomerRequest $request)
    {
        $this->authorize('create', Customer::class);
        return $this->customersService->store($request);
    }

    public function edit(Request $request)
    {
        $this->authorize('update', Customer::class);
        return $this->customersService->edit($request);
    }

    public function update(CustomerRequest $request)
    {
        $this->authorize('update', Customer::class);
        return $this->customersService->update($request);
    }

    public function destroy(Request $request)
    {
        $this->authorize('delete', Customer::class);
        return $this->customersService->destroy($request);
    }
    public function loadDistrict(Request $request)
    {
        return $this->customersService->loadDistrict($request);
    }
}

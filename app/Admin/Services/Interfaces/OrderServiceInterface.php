<?php
namespace App\Admin\Services\Interfaces;

interface OrderServiceInterface
{
    public function index($request);
    public function create();
    public function store($request);
    public function destroy($request);
    public function edit($request);
    public function update($request);
    public function view($request);
    public function loadProduct($request);
    public function redirectCreated();
    public function redirectUpdated();
}

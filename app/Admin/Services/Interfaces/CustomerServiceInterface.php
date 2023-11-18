<?php
namespace App\Admin\Services\Interfaces;

interface CustomerServiceInterface
{
    public function index($request);
    public function store($request);
    public function destroy($request);
    public function edit($request);
    public function update($request);
    public function loadDistrict($request);
}

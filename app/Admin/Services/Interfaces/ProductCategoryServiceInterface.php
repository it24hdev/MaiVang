<?php
namespace App\Admin\Services\Interfaces;

interface ProductCategoryServiceInterface
{
    public function index();
    public function load($request);
    public function updateLocation($request);
    public function store($request);
    public function edit($request);
    public function destroy($request);
    public function update($request);
    public function destroyAttribute($request);
    public function loadAttribute($request);
    public function addAttribute($request);
    public function loadAddAttribute($request);
    public function addingAttribute($request);
}

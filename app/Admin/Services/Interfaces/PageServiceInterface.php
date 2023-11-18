<?php
namespace App\Admin\Services\Interfaces;

interface PageServiceInterface
{
    public function load();
    public function store($request);
    public function destroy($request);
    public function edit($request);
    public function update($request);
}

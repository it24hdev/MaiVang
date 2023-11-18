<?php
namespace App\Admin\Services\Interfaces;

interface MenuServiceInterface
{
    public function index($request);
    public function update($request);
    public function storeItem($request);
    public function storeMenu($request);
    public function destroyMenu($request);
    public function position($request);
}

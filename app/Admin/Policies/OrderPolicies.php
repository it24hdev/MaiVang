<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class OrderPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyOrder');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewOrder');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createOrder');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateOrder');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteOrder');
    }
}

<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class CustomerPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyCustomer');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createCustomer');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateCustomer');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteCustomer');
    }
}

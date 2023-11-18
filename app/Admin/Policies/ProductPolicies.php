<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class ProductPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyProduct');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewProduct');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createProduct');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateProduct');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteProduct');
    }

    public function restore(): bool
    {
        return  Common::checkPermission('restoreProduct');
    }
}

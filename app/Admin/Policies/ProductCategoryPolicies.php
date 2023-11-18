<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class ProductCategoryPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyCategoryProduct');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewCategoryProduct');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createCategoryProduct');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateCategoryProduct');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteCategoryProduct');
    }

    public function restore(): bool
    {
        return  Common::checkPermission('restoreCategoryProduct');
    }
}

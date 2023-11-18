<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class PostCategoryPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyCategoryPost');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewCategoryPost');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createCategoryPost');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateCategoryPost');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteCategoryPost');
    }
}

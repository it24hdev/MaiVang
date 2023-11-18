<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class PagePolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyPage');
    }


    public function create(): bool
    {
        return  Common::checkPermission('createPage');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updatePage');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deletePage');
    }

}

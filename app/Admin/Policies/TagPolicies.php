<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class TagPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyTag');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createTag');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateTag');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteTag');
    }
}

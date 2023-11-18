<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class RolePolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyRole');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewRole');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createRole');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateRole');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteRole');
    }

    public function restore(): bool
    {
        return  Common::checkPermission('restoreRole');
    }

}

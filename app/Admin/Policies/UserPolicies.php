<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class UserPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyUser');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewUser');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createUser');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateUser');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteUser');
    }

    public function restore(): bool
    {
        return  Common::checkPermission('restoreUser');
    }

}

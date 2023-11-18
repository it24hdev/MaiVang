<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class MenuPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyMenu');
    }


    public function create(): bool
    {
        return  Common::checkPermission('createMenu');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateMenu');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteMenu');
    }

}

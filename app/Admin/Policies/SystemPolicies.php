<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class SystemPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnySystem');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateSystem');
    }
}

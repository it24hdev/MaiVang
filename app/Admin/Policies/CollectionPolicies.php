<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class CollectionPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyCollection');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createCollection');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateCollection');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteCollection');
    }
}

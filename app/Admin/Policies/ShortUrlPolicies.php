<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class ShortUrlPolicies
{
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyShortUrl');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createShortUrl');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updateShortUrl');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deleteShortUrl');
    }
}

<?php

namespace App\Admin\Policies;

use App\Admin\Http\Helpers\Common;

class PostPolicies
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        return  Common::checkPermission('viewAnyPost');
    }

    public function view(): bool
    {
        return  Common::checkPermission('viewPost');
    }

    public function create(): bool
    {
        return  Common::checkPermission('createPost');
    }

    public function update(): bool
    {
        return  Common::checkPermission('updatePost');
    }

    public function delete(): bool
    {
        return  Common::checkPermission('deletePost');
    }

    public function restore(): bool
    {
        return  Common::checkPermission('restorePost');
    }
}

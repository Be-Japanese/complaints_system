<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{

    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('show-categories');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('show-categories');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create-categories');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit-categories');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete-categories');
    }

}

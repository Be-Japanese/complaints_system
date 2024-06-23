<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ComplaintPolicy
{

    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('show-complaints');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('show-complaints');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create-complaints');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit-complaints');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete-complaints');
    }

}

<?php

namespace App\Policies;

use App\Models\Advertise;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdvertisePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('show-advertising');
    }

    public function view(User $user): bool
    {
        return $user->hasPermissionTo('show-advertising');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-advertising');
    }

    public function update(User $user): bool
    {
        return $user->hasPermissionTo('edit-advertising');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('delete-advertising');
    }
}

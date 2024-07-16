<?php

namespace App\Policies;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StatisticPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('show-statistic');
    }

    public function view(User $user): bool
    {
        return $user->hasPermissionTo('show-statistic');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create-statistic');
    }

    public function update(User $user): bool
    {
        return $user->hasPermissionTo('edit-statistic');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('delete-statistic');
    }
}

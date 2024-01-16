<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Photograph;
use App\Models\User;

class PhotographPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Photograph');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Photograph $photograph): bool
    {
        return $user->checkPermissionTo('view Photograph');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Photograph');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Photograph $photograph): bool
    {
        return $user->checkPermissionTo('update Photograph');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Photograph $photograph): bool
    {
        return $user->checkPermissionTo('delete Photograph');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Photograph $photograph): bool
    {
        return $user->checkPermissionTo('restore Photograph');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Photograph $photograph): bool
    {
        return $user->checkPermissionTo('force-delete Photograph');
    }
}

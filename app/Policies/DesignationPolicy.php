<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Designation;
use App\Models\User;

class DesignationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Designation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Designation $designation): bool
    {
        return $user->checkPermissionTo('view Designation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Designation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Designation $designation): bool
    {
        return $user->checkPermissionTo('update Designation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Designation $designation): bool
    {
        return $user->checkPermissionTo('delete Designation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Designation $designation): bool
    {
        return $user->checkPermissionTo('restore Designation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Designation $designation): bool
    {
        return $user->checkPermissionTo('force-delete Designation');
    }
}

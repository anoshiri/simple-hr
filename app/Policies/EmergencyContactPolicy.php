<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\EmergencyContact;
use App\Models\User;

class EmergencyContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any EmergencyContact');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EmergencyContact $emergencycontact): bool
    {
        return $user->checkPermissionTo('view EmergencyContact');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create EmergencyContact');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EmergencyContact $emergencycontact): bool
    {
        return $user->checkPermissionTo('update EmergencyContact');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EmergencyContact $emergencycontact): bool
    {
        return $user->checkPermissionTo('delete EmergencyContact');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EmergencyContact $emergencycontact): bool
    {
        return $user->checkPermissionTo('restore EmergencyContact');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EmergencyContact $emergencycontact): bool
    {
        return $user->checkPermissionTo('force-delete EmergencyContact');
    }
}

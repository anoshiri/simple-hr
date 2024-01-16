<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PersonalInformation;
use App\Models\User;

class PersonalInformationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PersonalInformation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PersonalInformation $personalinformation): bool
    {
        return $user->checkPermissionTo('view PersonalInformation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PersonalInformation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PersonalInformation $personalinformation): bool
    {
        return $user->checkPermissionTo('update PersonalInformation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PersonalInformation $personalinformation): bool
    {
        return $user->checkPermissionTo('delete PersonalInformation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PersonalInformation $personalinformation): bool
    {
        return $user->checkPermissionTo('restore PersonalInformation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PersonalInformation $personalinformation): bool
    {
        return $user->checkPermissionTo('force-delete PersonalInformation');
    }
}

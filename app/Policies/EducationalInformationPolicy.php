<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\EducationalInformation;
use App\Models\User;

class EducationalInformationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any EducationalInformation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EducationalInformation $educationalinformation): bool
    {
        return $user->checkPermissionTo('view EducationalInformation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create EducationalInformation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EducationalInformation $educationalinformation): bool
    {
        return $user->checkPermissionTo('update EducationalInformation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EducationalInformation $educationalinformation): bool
    {
        return $user->checkPermissionTo('delete EducationalInformation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EducationalInformation $educationalinformation): bool
    {
        return $user->checkPermissionTo('restore EducationalInformation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EducationalInformation $educationalinformation): bool
    {
        return $user->checkPermissionTo('force-delete EducationalInformation');
    }
}

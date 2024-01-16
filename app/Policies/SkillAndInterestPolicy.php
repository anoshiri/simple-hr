<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SkillAndInterest;
use App\Models\User;

class SkillAndInterestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any SkillAndInterest');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SkillAndInterest $skillandinterest): bool
    {
        return $user->checkPermissionTo('view SkillAndInterest');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create SkillAndInterest');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SkillAndInterest $skillandinterest): bool
    {
        return $user->checkPermissionTo('update SkillAndInterest');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SkillAndInterest $skillandinterest): bool
    {
        return $user->checkPermissionTo('delete SkillAndInterest');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SkillAndInterest $skillandinterest): bool
    {
        return $user->checkPermissionTo('restore SkillAndInterest');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SkillAndInterest $skillandinterest): bool
    {
        return $user->checkPermissionTo('force-delete SkillAndInterest');
    }
}

<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\EmploymentHistory;
use App\Models\User;

class EmploymentHistoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any EmploymentHistory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EmploymentHistory $employmenthistory): bool
    {
        return $user->checkPermissionTo('view EmploymentHistory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create EmploymentHistory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EmploymentHistory $employmenthistory): bool
    {
        return $user->checkPermissionTo('update EmploymentHistory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EmploymentHistory $employmenthistory): bool
    {
        return $user->checkPermissionTo('delete EmploymentHistory');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EmploymentHistory $employmenthistory): bool
    {
        return $user->checkPermissionTo('restore EmploymentHistory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EmploymentHistory $employmenthistory): bool
    {
        return $user->checkPermissionTo('force-delete EmploymentHistory');
    }
}

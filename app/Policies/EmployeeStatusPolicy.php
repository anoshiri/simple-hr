<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\EmployeeStatus;
use App\Models\User;

class EmployeeStatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any EmployeeStatus');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EmployeeStatus $employeestatus): bool
    {
        return $user->checkPermissionTo('view EmployeeStatus');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create EmployeeStatus');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EmployeeStatus $employeestatus): bool
    {
        return $user->checkPermissionTo('update EmployeeStatus');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EmployeeStatus $employeestatus): bool
    {
        return $user->checkPermissionTo('delete EmployeeStatus');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EmployeeStatus $employeestatus): bool
    {
        return $user->checkPermissionTo('restore EmployeeStatus');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EmployeeStatus $employeestatus): bool
    {
        return $user->checkPermissionTo('force-delete EmployeeStatus');
    }
}

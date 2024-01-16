<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PerformanceRecord;
use App\Models\User;

class PerformanceRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PerformanceRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PerformanceRecord $performancerecord): bool
    {
        return $user->checkPermissionTo('view PerformanceRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PerformanceRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PerformanceRecord $performancerecord): bool
    {
        return $user->checkPermissionTo('update PerformanceRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerformanceRecord $performancerecord): bool
    {
        return $user->checkPermissionTo('delete PerformanceRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerformanceRecord $performancerecord): bool
    {
        return $user->checkPermissionTo('restore PerformanceRecord');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerformanceRecord $performancerecord): bool
    {
        return $user->checkPermissionTo('force-delete PerformanceRecord');
    }
}

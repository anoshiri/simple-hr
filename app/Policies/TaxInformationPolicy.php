<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\TaxInformation;
use App\Models\User;

class TaxInformationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any TaxInformation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TaxInformation $taxinformation): bool
    {
        return $user->checkPermissionTo('view TaxInformation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create TaxInformation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TaxInformation $taxinformation): bool
    {
        return $user->checkPermissionTo('update TaxInformation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TaxInformation $taxinformation): bool
    {
        return $user->checkPermissionTo('delete TaxInformation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TaxInformation $taxinformation): bool
    {
        return $user->checkPermissionTo('restore TaxInformation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TaxInformation $taxinformation): bool
    {
        return $user->checkPermissionTo('force-delete TaxInformation');
    }
}

<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\BankingInformation;
use App\Models\User;

class BankingInformationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any BankingInformation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BankingInformation $bankinginformation): bool
    {
        return $user->checkPermissionTo('view BankingInformation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create BankingInformation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BankingInformation $bankinginformation): bool
    {
        return $user->checkPermissionTo('update BankingInformation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BankingInformation $bankinginformation): bool
    {
        return $user->checkPermissionTo('delete BankingInformation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BankingInformation $bankinginformation): bool
    {
        return $user->checkPermissionTo('restore BankingInformation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BankingInformation $bankinginformation): bool
    {
        return $user->checkPermissionTo('force-delete BankingInformation');
    }
}

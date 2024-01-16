<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\IdentificationDocument;
use App\Models\User;

class IdentificationDocumentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any IdentificationDocument');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, IdentificationDocument $identificationdocument): bool
    {
        return $user->checkPermissionTo('view IdentificationDocument');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create IdentificationDocument');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, IdentificationDocument $identificationdocument): bool
    {
        return $user->checkPermissionTo('update IdentificationDocument');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, IdentificationDocument $identificationdocument): bool
    {
        return $user->checkPermissionTo('delete IdentificationDocument');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, IdentificationDocument $identificationdocument): bool
    {
        return $user->checkPermissionTo('restore IdentificationDocument');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, IdentificationDocument $identificationdocument): bool
    {
        return $user->checkPermissionTo('force-delete IdentificationDocument');
    }
}

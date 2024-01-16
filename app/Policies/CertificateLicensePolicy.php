<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\CertificateLicense;
use App\Models\User;

class CertificateLicensePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any CertificateLicense');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CertificateLicense $certificatelicense): bool
    {
        return $user->checkPermissionTo('view CertificateLicense');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create CertificateLicense');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CertificateLicense $certificatelicense): bool
    {
        return $user->checkPermissionTo('update CertificateLicense');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CertificateLicense $certificatelicense): bool
    {
        return $user->checkPermissionTo('delete CertificateLicense');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CertificateLicense $certificatelicense): bool
    {
        return $user->checkPermissionTo('restore CertificateLicense');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CertificateLicense $certificatelicense): bool
    {
        return $user->checkPermissionTo('force-delete CertificateLicense');
    }
}

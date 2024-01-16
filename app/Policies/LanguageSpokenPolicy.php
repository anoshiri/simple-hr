<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\LanguageSpoken;
use App\Models\User;

class LanguageSpokenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any LanguageSpoken');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LanguageSpoken $languagespoken): bool
    {
        return $user->checkPermissionTo('view LanguageSpoken');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create LanguageSpoken');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LanguageSpoken $languagespoken): bool
    {
        return $user->checkPermissionTo('update LanguageSpoken');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LanguageSpoken $languagespoken): bool
    {
        return $user->checkPermissionTo('delete LanguageSpoken');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LanguageSpoken $languagespoken): bool
    {
        return $user->checkPermissionTo('restore LanguageSpoken');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LanguageSpoken $languagespoken): bool
    {
        return $user->checkPermissionTo('force-delete LanguageSpoken');
    }
}

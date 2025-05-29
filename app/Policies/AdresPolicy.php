<?php

namespace App\Policies;

use App\Models\Adres;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdresPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow users to view their own addresses
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Adres $adres): bool
    {
        // Allow users to view their own address
        return $user->id === $adres->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Allow authenticated users to create addresses
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Adres $adres)
    {
        return $user->id === $adres->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Adres $adres): bool
    {
        return $user->id === $adres->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Adres $adres): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Adres $adres): bool
    {
        return false;
    }
}

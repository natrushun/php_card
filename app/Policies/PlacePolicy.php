<?php

namespace App\Policies;

use App\Models\Place;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlacePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user !=null && $user->admin==1;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user !=null && $user->admin==1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Place $place): bool
    {
        return $user !=null && $user->admin==1;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Place $place): bool
    {
        return $user !==null && $user->admin==1;
    }

}

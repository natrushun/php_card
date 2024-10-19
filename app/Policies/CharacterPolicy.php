<?php

namespace App\Policies;

use App\Models\Character;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CharacterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user!=null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Character $character): bool
    {
        return $user!=null && $user->id==$character->user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user!=null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Character $character): bool
    {
        return $user!=null && $user->id==$character->user->id || ($user!=null&& $user->admin && $character->enemy);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Character $character): bool
    {
        return ($user!=null && $user->id==$character->user->id) || ($user!=null && $user->admin && $character->enemy);
    }
    

}

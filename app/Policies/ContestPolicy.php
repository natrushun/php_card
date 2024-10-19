<?php

namespace App\Policies;

use App\Models\Contest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContestPolicy
{
    
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contest $contest): bool
    {
        return ($user!=null && $user->id==$contest->user->id )||($user!=null&& $user->admin);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user!=null;
    }


     
    public function update(User $user, Contest $contest): bool
    {
        return $user!=null && $user->id==$contest->user->id;
    }

    /*
     * Determine whether the user can delete the model.
     
    public function delete(User $user, Contest $contest): bool
    {
        
    }*/
}

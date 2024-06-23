<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployerPolicy
{
    
    public function viewAny(User $user)
    {
        return false;
    }

    
    public function view(User $user, Employer $employer)
    {
        return false;
    }

    
    public function create(User $user)
    {
        return null == $user->employer;
    }

    public function update(User $user, Employer $employer)
    {
        return null == $user->employer;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employer $employer)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employer $employer)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employer $employer)
    {
        return false;
    }
}

<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyEmployer(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job)
    {
        if ($job->employer->user_id !== $user->id) {
            return false;
        }

        if ($job->jobApplications()->count() > 0) {
            return Response::deny('Cannot change the job with applications');
        }

        return true;
    }

    
    public function delete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    
    public function restore(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    public function forceDelete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    public function apply(User $user, job $job): bool
    {
        return !$job->hasUserApplied($user);
    }
}

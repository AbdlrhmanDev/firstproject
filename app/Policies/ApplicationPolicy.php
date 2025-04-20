<?php

namespace App\Policies;
use App\Models\Application;

use App\Models\User;

class ApplicationPolicy
{
    /**
     * Create a new policy instance.
     */
   
        /**
     * Determine if the authenticated employer can update the status of the application.
     */
    public function updateStatus(User $user, Application $application): bool
    {
        // Only employers can update, and only for jobs that belong to their company
        if (!$user->isEmployer()) {
            return false;
        }

        $job = $application->job;

        return $job && $job->company && $job->company->user_id === $user->id;
    }
    }

<?php

namespace App\Policies;

use App\User;
use App\Application;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Super administrator can access to all applications.
     *
     * @param $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the application.
     *
     * @param User $user
     * @param Application $application
     * @return mixed
     */
    public function view(User $user, Application $application)
    {
        return $user->id === $application->user_id;
    }

    /**
     * Determine whether the user can update the application.
     *
     * @param  User  $user
     * @param  Application  $application
     * @return mixed
     */
    public function update(User $user, Application $application)
    {
        return $this->view($user, $application);
    }

    /**
     * Determine whether the user can delete the application.
     *
     * @param  User  $user
     * @param  Application  $application
     * @return mixed
     */
    public function delete(User $user, Application $application)
    {
        return $this->view($user, $application);
    }

    /**
     * Determine whether the user can view the all applications.
     *
     * @return boolean
     */
    public function index()
    {
        return false;
    }
}

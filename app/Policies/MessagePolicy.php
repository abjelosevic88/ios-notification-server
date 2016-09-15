<?php

namespace App\Policies;

use App\Application;
use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Super administrator can access to all messages.
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
     * Determine whether the user can view the message.
     *
     * @param User $user
     * @param Message $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        return $user->id === $message->application->user_id;
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param  User  $user
     * @param  Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        return $this->view($user, $message);
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  User  $user
     * @param  Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        return $this->view($user, $message);
    }

    /**
     * Determine whether the user can view the all messages.
     *
     * @return boolean
     */
    public function index()
    {
        return false;
    }
}

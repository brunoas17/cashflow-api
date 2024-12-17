<?php

namespace App\Events;

use App\Models\User;

class UserCreated
{
    /**
     * Create a new event instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

}

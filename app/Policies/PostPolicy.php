<?php

namespace SuperGamer\Policies;

use SuperGamer\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use SuperGamer\Post;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function securePass(User $user, Post $post){
        return $user->id == $post->user_id;
    }
}

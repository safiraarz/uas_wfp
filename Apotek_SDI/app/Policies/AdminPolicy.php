<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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
    public function access(User $user)
    {
        return ($user->sebagai == "owner" || $user->sebagai == "pegawai" ? Response::allow() : Response::deny("You must be a super administrator")); 
    }
}

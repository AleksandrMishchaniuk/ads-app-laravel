<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ad;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\AuthManager;

class AdPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Ad $ad)
    {
        return (bool) $user;
    }

    public function manage(User $user, Ad $ad)
    {
        return $user->getId() === $ad->getUserId();
    }
}

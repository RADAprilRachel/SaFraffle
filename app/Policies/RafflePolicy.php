<?php

namespace App\Policies;

use App\User;
use App\Raffle;
use Illuminate\Auth\Access\HandlesAuthorization;

class RafflePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any raffles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can view the raffle.
     *
     * @param  \App\User  $user
     * @param  \App\Raffle  $raffle
     * @return mixed
     */
    public function view(User $user, Raffle $raffle)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can create raffles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can update the raffle.
     *
     * @param  \App\User  $user
     * @param  \App\Raffle  $raffle
     * @return mixed
     */
    public function update(User $user, Raffle $raffle)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can delete the raffle.
     *
     * @param  \App\User  $user
     * @param  \App\Raffle  $raffle
     * @return mixed
     */
    public function delete(User $user, Raffle $raffle)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can restore the raffle.
     *
     * @param  \App\User  $user
     * @param  \App\Raffle  $raffle
     * @return mixed
     */
    public function restore(User $user, Raffle $raffle)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can permanently delete the raffle.
     *
     * @param  \App\User  $user
     * @param  \App\Raffle  $raffle
     * @return mixed
     */
    public function forceDelete(User $user, Raffle $raffle)
    {
        return $user->isAdmin() or $user->isEditor();
    }
}

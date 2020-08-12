<?php

namespace App\Policies;

use App\User;
use App\RaffleItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class RaffleItemPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any raffle_items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can view the raffle_item.
     *
     * @param  \App\User  $user
     * @param  \App\RaffleItem  $raffle_item
     * @return mixed
     */
    public function view(User $user, RaffleItem $raffle_item)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can create raffle_items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can update the raffle_item.
     *
     * @param  \App\User  $user
     * @param  \App\RaffleItem  $raffle_item
     * @return mixed
     */
    public function update(User $user, RaffleItem $raffle_item)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can delete the raffle_item.
     *
     * @param  \App\User  $user
     * @param  \App\RaffleItem  $raffle_item
     * @return mixed
     */
    public function delete(User $user, RaffleItem $raffle_item)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can restore the raffle_item.
     *
     * @param  \App\User  $user
     * @param  \App\RaffleItem  $raffle_item
     * @return mixed
     */
    public function restore(User $user, RaffleItem $raffle_item)
    {
        return $user->isAdmin() or $user->isEditor();
    }

    /**
     * Determine whether the user can permanently delete the raffle_item.
     *
     * @param  \App\User  $user
     * @param  \App\RaffleItem  $raffle_item
     * @return mixed
     */
    public function forceDelete(User $user, RaffleItem $raffle_item)
    {
        return $user->isAdmin() or $user->isEditor();
    }
}

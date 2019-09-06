<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Countrys.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    public function store(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Country.
     *
     * @param  \App\User  $user
     * @param  \App\Country  $country
     * @return mixed
     */
    public function delete(User $user)
    {
        return true;
    }
}

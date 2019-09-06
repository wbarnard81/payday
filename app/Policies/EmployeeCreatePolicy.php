<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeeCreatePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function store(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return true;
    }
}

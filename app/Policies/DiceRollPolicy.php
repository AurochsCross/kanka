<?php

namespace App\Policies;

use App\User;
use App\Models\Character;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiceRollPolicy extends MiscPolicy
{
    public function entityTypeID(): int
    {
        return config('entities.ids.dice_roll');
    }

    public function roll(User $user, $entity)
    {
        return $this->view($user, $entity);
    }
}

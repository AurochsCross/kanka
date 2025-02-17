<?php

namespace App\Policies;

use App\Models\Campaign;
use App\User;

class DiceRollResultPolicy extends MiscPolicy
{
    public function entityTypeID(): int
    {
        return config('entities.ids.dice_roll');
    }

    public function update(User $user, $entity)
    {
        return false;
    }

    public function delete(User $user, $entity)
    {
        return false;
    }

    public function view(User $user, $entity)
    {
        return true;
    }

    public function create(User $user, $entity = null, Campaign $campaign = null)
    {
        return false;
    }
}

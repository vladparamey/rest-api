<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserObserver
 * @package App\Observers
 */
class UserObserver
{
    /**
     * @param User $user
     */
    public function creating(User $user): void
    {
        $user->password = Hash::make($user->password);
    }
}

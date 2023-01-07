<?php

namespace App\Observers;

use App\Models\Interest;
use Illuminate\Support\Facades\Auth;

/**
 * Class InterestObserver
 * @package App\Observers
 */
class InterestObserver
{
    /**
     * @param Interest $interest
     */
    public function creating(Interest $interest): void
    {
        $interest->user_id = Auth::user() ? Auth::id() : $interest->user_id;
    }
}

<?php

namespace App\Providers;

use App\Http\Resources\InterestResource;
use App\Models\Interest;
use App\Models\User;
use App\Observers\InterestObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        InterestResource::withoutWrapping();
        User::observe(UserObserver::class);
        Interest::observe(InterestObserver::class);
    }
}

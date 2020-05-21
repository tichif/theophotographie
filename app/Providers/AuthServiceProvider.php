<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Album;
use App\Policies\AlbumPolicy;
use App\Category;
use App\Policies\CategoryPolicy;
use App\Plan;
use App\Policies\PlanPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Album::class => AlbumPolicy::class,
        Category::class => CategoryPolicy::class,
        Plan::class => PlanPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

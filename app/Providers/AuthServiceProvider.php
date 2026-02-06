<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\blog;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('modify-blog', function (User $user, blog $blogs) {
            return $blogs->user_id === $user->id;
        });
    }
}

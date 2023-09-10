<?php

namespace App\Providers;

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
     * 
     * @return void
     */
    public function boot()
    {

        // 管理者ユーザーのゲート
        Gate::define('isAdministrator',function($user){
            return $user->role === 1;
        });

        // 一般ユーザーのゲート
        Gate::define('isUser', function($user){
            return $user->role === 0 || $user->role === 1;
        });
    }
}

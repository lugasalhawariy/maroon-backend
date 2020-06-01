<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         /* define a admin user role */
         Gate::define('isAdmin', function($user) {
            return $user->role == 'ADMIN';
         });
        
         /* define a manager user role */
         Gate::define('isKetua', function($user) {
             return $user->role == 'KETUA';
         });

         /* define a manager user role */
         Gate::define('isSekum', function($user) {
            return $user->role == 'SEKRETARIS';
        });

        /* define a manager user role */
        Gate::define('isBendum', function($user) {
            return $user->role == 'BENDAHARA';
        });

        /* define a manager user role */
        Gate::define('isOrganisasi', function($user) {
            return $user->role == 'ORGANISASI';
        });

         /* define a manager user role */
         Gate::define('isBider', function($user) {
            return $user->role == 'BIDER';
        });

        /* define a manager user role */
        Gate::define('isRPK', function($user) {
            return $user->role == 'RPK';
        });

        /* define a manager user role */
        Gate::define('isMedkom', function($user) {
            return $user->role == 'MEDKOM';
        });

        /* define a manager user role */
        Gate::define('isSBO', function($user) {
            return $user->role == 'SBO';
        });

        /* define a manager user role */
        Gate::define('isHikmah', function($user) {
            return $user->role == 'HIKMAH';
        });

        /* define a manager user role */
        Gate::define('isKWU', function($user) {
            return $user->role == 'KWU';
        });

        /* define a manager user role */
        Gate::define('isSospem', function($user) {
            return $user->role == 'SOSPEM';
        });

        /* define a manager user role */
        Gate::define('isKader', function($user) {
            return $user->role == 'KADER';
        });
       
         /* define a user role */
         Gate::define('isAlumni', function($user) {
             return $user->role == 'ALUMNI';
         });

         /* define a user role */
         Gate::define('isUser', function($user) {
            return $user->role == 'USER';
        });

         /* define a user role */
         Gate::define('internal', function() {

            if(Auth::user()->role == 'USER'){
                return Auth::logout();
            }
        });

         Passport::routes();
    }
}

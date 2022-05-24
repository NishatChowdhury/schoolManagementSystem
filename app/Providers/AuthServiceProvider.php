<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ims',function($user){
            return $user->module == 1;
            //dd($user->roles);
//            foreach ($user->roles as $role){
//                foreach($role->permissions as $permission){
//                    if($permission->name == 'HRM'){
//                        return $permission->name == 'HRM';
//                    }
//                }
//            }

        });

        Gate::define('cms',function($user){
            return $user->module == 0;
            //dd($user->roles);
//            foreach ($user->roles as $role){
//                foreach($role->permissions as $permission){
//                    if($permission->name == 'Payroll'){
//                        return $permission->name == 'Payroll';
//                    }
//                }
//            }
        });
    }
}

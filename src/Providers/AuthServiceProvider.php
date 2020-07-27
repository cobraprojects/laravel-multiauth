<?php

namespace CobraProjects\Multiauth\Providers;

use CobraProjects\Multiauth\Model\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        $this->registerPolicies();
        Gate::before(function ($admin, $ability) {
            if ($admin instanceof Admin) {
                if ($this->isSuperAdmin($admin)) {
                    return true;
                }
                return $admin->hasPermission($ability);
            }
        });
    }

    protected function isSuperAdmin($admin)
    {
        return in_array('super', $admin->roles->pluck('name')->toArray());
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function(User $user) {
            return $user->role->name === 'admin';
        });
        
        Gate::define('pembimbing-lapangan', function(User $user) {
            return $user->role->name === 'pembimbing_lapangan';
        });
        
        Gate::define('guru', function(User $user) {
            return $user->role->name === 'guru';
        });
        
        Gate::define('siswa', function(User $user) {
            return $user->role->name === 'siswa';
        });
        
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('role', function ($role){
            return "<?php if(auth('admin')->check() && auth('admin')->user()->hasRole({$role})): ?>";
        });
        Blade::directive('endrole', function (){
            return "<?php endif; ?>";
        });
    }
}

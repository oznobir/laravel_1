<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('role', function (string $role) {
            return "<?php if(auth('admin')->check() && auth('admin')->user()->hasRole($role)): ?>";
        });
        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });
        Blade::directive('permission', function (string $permission) {
            return "<?php if(auth('admin')->check() && auth('admin')->user()->hasPermission($permission)): ?>";
        });
        Blade::directive('endpermission', function () {
            return "<?php endif; ?>";
        });
//        Blade::directive('_if', function (string $permission, string $class) {
/*            return "<?= (auth('admin')->check() && auth('admin')->user()->hasPermission($permission)) ? $class : '' ?>";    */
//        });
//        Gate::before(function (Name $user, ?string $ability) {
//            if ($user->hasRole('admin')) {
//                return true;
//            }
//            return null;
//        });
//        Permission::get()->map(function (Permission $permission) {
//            Gate::define($permission->slug, function (Name $user) use ($permission) {
//                return $user->hasPermission($permission->slug);
//            });
//        });
    }
}

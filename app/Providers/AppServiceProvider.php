<?php

namespace App\Providers;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
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
        view()->composer('*', function ($view) {
            $admin_role = UserRole::where('role_name', 'Admin')->first();
            $admins_collection = User::where('role_id', $admin_role->id)->get();
            $admins = ResourcesUser::collection($admins_collection)->toArray(request());

            if (Auth::check()) {
                // Current user
                $current_user = new ResourcesUser(Auth::user());
                $user_data = $current_user->toArray(request());

                $view->with('current_user', $user_data);
            }

            $view->with('admins', $admins);
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }
}

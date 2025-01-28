<?php

namespace App\Providers;

use App\Http\Resources\PaymentGateway as ResourcesPaymentGateway;
use App\Http\Resources\Status as ResourcesStatus;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\UserRole as ResourcesUserRole;
use App\Models\PaymentGateway;
use App\Models\Status;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        view()->composer('*', function ($view) {
            // Users with role "Admin"
            $admin_role = UserRole::where('role_name', 'Admin')->first();
            $admins_collection = User::where('role_id', $admin_role->id)->get();
            $admins = ResourcesUser::collection($admins_collection)->toArray(request());

            if (Auth::check()) {
                // Current user
                $current_user = new ResourcesUser(Auth::user());
                $user_data = $current_user->toArray(request());
                // Roles list
                $roles_collection = UserRole::all();
                $roles = ResourcesUserRole::collection($roles_collection)->toArray(request());
                // Statuses list
                $statuses_collection = Status::all();
                $statuses = ResourcesStatus::collection($statuses_collection)->toArray(request());
                // Payment gateways list
                $payment_gateways_collection = PaymentGateway::all();
                $payment_gateways = ResourcesPaymentGateway::collection($payment_gateways_collection)->toArray(request());

                $view->with('current_user', $user_data);
                $view->with('roles', $roles);
                $view->with('statuses', $statuses);
                $view->with('payment_gateways', $payment_gateways);
            }

            $view->with('admins', $admins);
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }
}

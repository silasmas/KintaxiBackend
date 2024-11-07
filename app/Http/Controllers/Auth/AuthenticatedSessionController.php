<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request): RedirectResponse
    {
        $admin_role = UserRole::where('role_name', 'Admin')->first();
        $user_role = UserRole::where('role_name', 'User')->first();
        $roleIds = [$admin_role->id, $user_role->id];

        // Get inputs
        $inputs = [
            'username' => $request->login_username,
            'password' => $request->login_password
        ];

        if (trim($inputs['username']) == null) {
            return redirect()->back()->with('error_message', __('validation.required', ['attribute' => __('miscellaneous.login_username')]));
        }

        if (trim($inputs['password']) == null) {
            return redirect()->back()->with('error_message', __('validation.required', ['attribute' => __('miscellaneous.password.label')]));
        }

        if (is_numeric($inputs['username'])) {
            $user = User::where('phone', $inputs['username'])->first();

            if (!$user) {
                return redirect()->back()->with('error_message', __('auth.username'));
            }

            if (!Hash::check($inputs['password'], $user->password)) {
                return redirect()->back()->with('error_message', __('auth.password'));
            }

            if (!$user->hasRole($roleIds)) {
                return redirect()->back()->with('error_message', __('auth.unauthorized'));
            }

            // Authentication datas (E-mail, Phone number or Username)
            $auth_phone = Auth::attempt(['phone' => $user->phone, 'password' => $inputs['password']], $request->remember);
            $auth_email = Auth::attempt(['email' => $user->email, 'password' => $inputs['password']], $request->remember);
            $auth_username = Auth::attempt(['username' => $user->username, 'password' => $inputs['password']], $request->remember);

            if ($auth_phone || $auth_email || $auth_username) {
                $request->session()->regenerate();

                return redirect(RouteServiceProvider::HOME);
            }

        } else {
            $user = User::where('email', $inputs['username'])->orWhere('username', $inputs['username'])->first();

            if (!$user) {
                return redirect()->back()->with('error_message', __('auth.username'));
            }

            if (!Hash::check($inputs['password'], $user->password)) {
                return redirect()->back()->with('error_message', __('auth.password'));
            }

            if (!$user->hasRole($roleIds)) {
                return redirect()->back()->with('error_message', __('auth.unauthorized'));
            }

            // Authentication datas (E-mail, Phone number or Username)
            $auth_phone = Auth::attempt(['phone' => $user->phone, 'password' => $inputs['password']], $request->remember);
            $auth_email = Auth::attempt(['email' => $user->email, 'password' => $inputs['password']], $request->remember);
            $auth_username = Auth::attempt(['username' => $user->username, 'password' => $inputs['password']], $request->remember);

            if ($auth_phone || $auth_email || $auth_username) {
                $request->session()->regenerate();

                return redirect(RouteServiceProvider::HOME);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

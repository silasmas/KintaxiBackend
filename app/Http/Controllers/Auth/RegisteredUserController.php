<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\Status;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class RegisteredUserController extends Controller
{
    public static $admin_role;
    public static $activated_status;

    public function __construct()
    {
        $this::$admin_role = UserRole::where('role_name', 'Admin')->first();
        $this::$activated_status = Status::where('status_name', 'activé/confirmé/récu')->first();
    }

    /**
     * Display the registration view.
     * 
     * @return  \Illuminate\View\View
     */
    public function create(): View
    {
        $admins = User::where('role_id', $this::$admin_role->id)->count();

        if ($admins > 0) {
            abort(403);

        } else {
            return view('auth.register');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @return  \Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // User inputs
        $inputs = [
            'firstname' => $request->register_firstname,
            'lastname' => $request->register_lastname,
            'surname' => $request->register_surname,
            'username' => $request->register_username,
            'birthdate' => !empty($request->register_birthdate) ? explode('/', $request->register_birthdate)[2] . '-' . explode('/', $request->register_birthdate)[1] . '-' . explode('/', $request->register_birthdate)[0] : null,
            'gender' => $request->register_gender,
            'phone' => $request->register_phone,
            'email' => $request->register_email,
            'address_1' => $request->register_address_1,
            'address_2' => $request->register_address_2,
            'p_o_box' => $request->register_p_o_box,
            'password' => $request->register_password,
            'confirm_password' => $request->confirm_password,
            'status_id' => $this::$activated_status->id,
            'role_id' => $this::$admin_role->id
        ];
        $users = User::all();

        // Validate required fields
        if (trim($inputs['firstname']) == null) {
            return redirect()->back()->with('error_message', __('validation.required', ['attribute' => __('miscellaneous.firstname')]));
        }

        if ($inputs['username'] != null) {
            // Check if username already exists
            foreach ($users as $another_user):
                if ($another_user->username == $inputs['username']) {
                    return redirect()->back()->with('error_message', __('validation.custom.username.exists'));
                }
            endforeach;

            // Check correct username
            if (preg_match('#^[\w]+$#', $inputs['username']) == 0) {
                return redirect()->back()->with('error_message', __('validation.custom.username.incorrect'));
            }
        }

        if (trim($inputs['email']) == null AND trim($inputs['phone']) == null) {
            return redirect()->back()->with('error_message', __('validation.custom.email_or_phone.required'));
        }

        if (trim($inputs['password']) == null) {
            return redirect()->back()->with('error_message', __('validation.required', ['attribute' => __('miscellaneous.password.label')]));
        }

        if (preg_match('#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $inputs['password']) == 0) {
            return redirect()->back()->with('error_message', __('miscellaneous.password.error'));
        }

        if (trim($inputs['confirm_password']) == null) {
            return redirect()->back()->with('error_message', __('validation.required', ['attribute' => __('miscellaneous.confirm_password.label')]));
        }

        if ($inputs['confirm_password'] != $inputs['password']) {
            return redirect()->back()->with('error_message', __('miscellaneous.confirm_password.error'));
        }

        $random_string = (string) random_int(1000000, 9999999);

        if ($inputs['email'] != null AND $inputs['phone'] != null) {
            PasswordReset::create([
                'email' => $inputs['email'],
                'phone' => $inputs['phone'],
                'token' => $random_string,
                'former_password' => $inputs['password']
            ]);

        } else {
            if ($inputs['email'] != null) {
                PasswordReset::create([
                    'email' => $inputs['email'],
                    'token' => $random_string,
                    'former_password' => $inputs['password']
                ]);
            }

            if ($inputs['phone'] != null) {
                PasswordReset::create([
                    'phone' => $inputs['phone'],
                    'token' => $random_string,
                    'former_password' => $inputs['password']
                ]);
            }
        }

        User::create($inputs);

        return redirect(RouteServiceProvider::HOME);
    }
}

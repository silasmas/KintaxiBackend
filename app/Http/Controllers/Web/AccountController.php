<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country as ResourcesCountry;
use App\Models\Country;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Random;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class AccountController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Account page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('account');
    }

    /**
     * GET: Account entity page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function indexEntity($entity)
    {
        if ($entity == 'account_settings') {
            $countries_collection = Country::orderBy('name_' . app()->getLocale())->get();
            $countries_data = ResourcesCountry::collection($countries_collection)->toArray(request());

            return view('account', [
                'countries' => $countries_data,
                'entity'=> $entity,
                'entity_title'=> __('miscellaneous.menu.account.title'),
            ]);
        }

        if ($entity == 'password_update') {
            return view('account', [
                'entity'=> $entity,
                'entity_title'=> __('miscellaneous.account.update_password.title'),
            ]);
        }
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * PUT: Update account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // 
    }

    /**
     * PUT: Update account entity
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEntity(Request $request, $entity)
    {
        $user = User::find(Auth::user()->id);
        $users = User::all();

        if ($entity == 'account_settings') {
            if ($request->status_id != null) {
                $user->update([
                    'status_id' => $request->status_id,
                    'updated_at' => now(),
                ]);
            }

            if ($request->firstname != null) {
                $user->update([
                    'firstname' => $request->firstname,
                    'updated_at' => now(),
                ]);
            }

            if ($request->lastname != null) {
                $user->update([
                    'lastname' => $request->lastname,
                    'updated_at' => now(),
                ]);
            }

            if ($request->surname != null) {
                $user->update([
                    'surname' => $request->surname,
                    'updated_at' => now(),
                ]);
            }

            if ($request->username != null) {
                // Check if username already exists
                foreach ($users as $another_user):
                    if (!empty($current_user->username)) {
                        if ($user->username != $request->username) {
                            if ($another_user->username == $request->username) {
                                return redirect()->back()->with('error_message', __('validation.custom.username.exists'));
                            }
                        }
                    }
                endforeach;

                $user->update([
                    'username' => $request->username,
                    'updated_at' => now(),
                ]);
            }

            if ($request->email != null) {
                // Check if email already exists
                foreach ($users as $another_user):
                    if (!empty($current_user->email)) {
                        if ($user->email != $request->email) {
                            if ($another_user->email == $request->email) {
                                return redirect()->back()->with('error_message', __('validation.custom.email.exists'));
                            }
                        }
                    }
                endforeach;

                // If it's a new email, reset "email_verified_at" column
                if ($user->email != $request->email) {
                    $user->update([
                        'email' => $request->email,
                        'email_verified_at' => null,
                        'updated_at' => now(),
                    ]);

                } else {
                    $user->update([
                        'email' => $request->email,
                        'updated_at' => now(),
                    ]);
                }

                // If user has a phone number, update "PasswordReset" table using "phone" column
                if (!empty($user->phone)) {
                    $password_reset_by_phone = PasswordReset::where('phone', $user->phone)->first();
                    $random_int_stringified = (string) random_int(1000000, 9999999);

                    if ($password_reset_by_phone != null) {
                        if (!empty($password_reset_by_phone->email)) {
                            if ($password_reset_by_phone->email != $request->email) {
                                $password_reset_by_phone->update([
                                    'email' => $request->email,
                                    'former_password' => $request->password != null ? $request->password : Random::generate(10, '0-9a-zA-Z'),
                                    'updated_at' => now(),
                                ]);
                            }
                        }

                        if (empty($password_reset_by_phone->email)) {
                            $password_reset_by_phone->update([
                                'email' => $request->email,
                                'former_password' => $request->password != null ? $request->password : Random::generate(10, '0-9a-zA-Z'),
                                'updated_at' => now(),
                            ]);
                        }
                    }

                    if ($password_reset_by_phone == null) {
                        $password_reset_by_email = PasswordReset::where('email', $request->email)->first();

                        if ($password_reset_by_email == null) {
                            PasswordReset::create([
                                'email' => $request->email,
                                'phone' => $user->phone,
                                'token' => $random_int_stringified,
                                'former_password' => $request->password != null ? $request->password : Random::generate(10, 'a-zA-Z'),
                            ]);
                        }
                    }

                // Otherwise update "PasswordReset" table using "email" column
                } else {
                    $random_int_stringified = (string) random_int(1000000, 9999999);

                    PasswordReset::create([
                        'email' => $request->email,
                        'token' => $random_int_stringified,
                        'former_password' => $request->password != null ? $request->password : Random::generate(10, 'a-zA-Z'),
                    ]);
                }
            }

            if ($request->phone != null) {
                // Check if phone already exists
                foreach ($users as $another_user):
                    if (!empty($current_user->phone)) {
                        if ($user->phone != $request->phone) {
                            if ($another_user->phone == $request->phone) {
                                return redirect()->back()->with('error_message', __('validation.custom.phone.exists'));
                            }
                        }
                    }
                endforeach;

                if ($user->phone != $request->phone) {
                    $user->update([
                        'phone' => $request->phone,
                        'phone_verified_at' => null,
                        'updated_at' => now(),
                    ]);

                } else {
                    $user->update([
                        'phone' => $request->phone,
                        'updated_at' => now(),
                    ]);
                }

                if (!empty($user->email)) {
                    $password_reset_by_email = PasswordReset::where('email', $user->email)->first();
                    $random_int_stringified = (string) random_int(1000000, 9999999);

                    if ($password_reset_by_email != null) {
                        if (!empty($password_reset_by_email->phone)) {
                            if ($password_reset_by_email->phone != $request->phone) {
                                $password_reset_by_email->update([
                                    'phone' => $request->phone,
                                    'former_password' => $request->password != null ? $request->password : Random::generate(10, '0-9a-zA-Z'),
                                    'updated_at' => now(),
                                ]);
                            }
                        }

                        if (empty($password_reset_by_email->phone)) {
                            $password_reset_by_email->update([
                                'phone' => $request->phone,
                                'former_password' => $request->password != null ? $request->password : Random::generate(10, '0-9a-zA-Z'),
                                'updated_at' => now(),
                            ]);
                        }
                    }

                    if ($password_reset_by_email == null) {
                        $password_reset_by_phone = PasswordReset::where('phone', $request->phone)->first();

                        if ($password_reset_by_email == null) {
                            PasswordReset::create([
                                'email' => $user->email,
                                'phone' => $request->phone,
                                'token' => $random_int_stringified,
                                'former_password' => $request->password != null ? $request->password : Random::generate(10, 'a-zA-Z'),
                            ]);
                        }
                    }

                } else {
                    $random_int_stringified = (string) random_int(1000000, 9999999);

                    PasswordReset::create([
                        'phone' => $request->phone,
                        'token' => $random_int_stringified,
                        'former_password' => $request->password != null ? $request->password : Random::generate(10, 'a-zA-Z'),
                    ]);
                }
            }

            if ($request->gender != null) {
                $user->update([
                    'gender' => $request->gender,
                    'updated_at' => now(),
                ]);
            }

            if ($request->birthdate != null) {
                $user->update([
                    'birthdate' => str_replace('_', '-', app()->getLocale()) == 'fr' ? explode('/', $request->birthdate)[2] . '-' . explode('/', $request->birthdate)[1] . '-' . explode('/', $request->birthdate)[0] : explode('/', $request->birthdate)[2] . '-' . explode('/', $request->birthdate)[0] . '-' . explode('/', $request->birthdate)[1],
                    'updated_at' => now(),
                ]);
            }

            if ($request->country_code != null) {
                $user->update([
                    'country_code' => $request->country_code,
                    'updated_at' => now(),
                ]);
            }

            if ($request->city != null) {
                $user->update([
                    'city' => $request->city,
                    'updated_at' => now(),
                ]);
            }

            if ($request->address_1 != null) {
                $user->update([
                    'address_1' => $request->address_1,
                    'updated_at' => now(),
                ]);
            }

            if ($request->address_2 != null) {
                $user->update([
                    'address_2' => $request->address_2,
                    'updated_at' => now(),
                ]);
            }

            if ($request->p_o_box != null) {
                $user->update([
                    'p_o_box' => $request->p_o_box,
                    'updated_at' => now(),
                ]);
            }

            if ($request->image_64 != null) {
                // $extension = explode('/', explode(':', substr($request->image_64, 0, strpos($request->image_64, ';')))[1])[1];
                $replace = substr($request->image_64, 0, strpos($request->image_64, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->image_64);
                $image = str_replace(' ', '+', $image);

                // Clean "avatars" directory
                $file = new Filesystem;
                $file->cleanDirectory($_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/users/' . $user->id . '/avatar');
                // Create image URL
                $image_url = 'images/users/' . $user->id . '/avatar/' . Str::random(50) . '.png';

                // Upload image
                Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

                $user->update([
                    'avatar_url' => $image_url,
                    'updated_at' => now(),
                ]);
            }
        }

        if ($entity == 'password_update') {
            if (Hash::check($request->former_password, $user->password) == false) {
                return redirect()->back()->with('error_message', __('auth.password'));
            }

            if ($request->confirm_new_password != $request->new_password) {
                return redirect()->back()->with('error_message', __('notifications.confirm_new_password'));
            }

            // Update password reset
            $password_reset_by_email = PasswordReset::where('email', $user->email)->first();
            $password_reset_by_phone = PasswordReset::where('phone', $user->phone)->first();

            if ($password_reset_by_email != null OR $password_reset_by_phone != null) {
                $random_string = (string) random_int(1000000, 9999999);

                if ($password_reset_by_email != null) {
                    // Update password reset in the case user want to reset his password
                    $password_reset_by_email->update([
                        'token' => $random_string,
                        'former_password' => $request->new_password,
                        'updated_at' => now(),
                    ]);
                }

                if ($password_reset_by_phone != null) {
                    // Update password reset in the case user want to reset his password
                    $password_reset_by_phone->update([
                        'token' => $random_string,
                        'former_password' => $request->new_password,
                        'updated_at' => now(),
                    ]);
                }
            }

            // update "password" and "password_visible" column
            $user->update([
                'password' => Hash::make($request->new_password),
                'updated_at' => now()
            ]);
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
    }
}

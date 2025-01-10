<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Http\Resources\Country as ResourcesCountry;
use App\Http\Resources\PasswordReset as ResourcesPasswordReset;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\UserRole as ResourcesUserRole;
use App\Http\Resources\Vehicle as ResourcesVehicle;
use App\Models\Country;
use App\Models\PasswordReset;
use App\Models\Status;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Vehicle;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use stdClass;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class RoleController extends BaseController
{
    public static $activated_status;

    public function __construct()
    {
        $this::$activated_status = Status::where('status_name', 'activé/confirmé/récu')->first();
    }

    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Role page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 
    }

    /**
     * GET: Role datas page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function indexEntity($entity)
    {
        if ($entity == 'manage-roles') {
            return view('role', [
                'entity' => $entity
            ]);
        }

        if ($entity == 'users') {
            $users_collection = User::where('id', '<>', Auth::user()->id)->orderByDesc('created_at')->get();
            $users_data = ResourcesUser::collection($users_collection)->toArray(request());
            $vehicles_collection = Vehicle::orderByDesc('created_at')->get();
            $vehicles_data = ResourcesVehicle::collection($vehicles_collection)->toArray(request());
            $countries_collection = Country::all();
            $countries_data = ResourcesUser::collection($countries_collection)->sortBy('name')->toArray();

            return view('role', [
                'entity' => $entity,
                'users' => $users_data,
                'vehicles' => $vehicles_data,
                'countries' => $countries_data,
            ]);
        }
    }

    /**
     * GET: Role datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // 
    }

    /**
     * GET: Role datas page
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function showEntity($entity, $id)
    {
        if ($entity == 'manage-roles') {
            $role_request = UserRole::find($id);
            $user_resource = new ResourcesUserRole($role_request);
            $role_data = $user_resource->toArray(request());

            return view('role', [
                'entity' => $entity,
                'current_role' => $role_data
            ]);
        }

        if ($entity == 'users') {
            $user_request = User::find($id);
            $user_resource = new ResourcesUser($user_request);
            $user_data = $user_resource->toArray(request());
            $vehicles_collection = Vehicle::orderByDesc('created_at')->get();
            $vehicles_data = ResourcesVehicle::collection($vehicles_collection)->toArray(request());
            $countries_collection = Country::orderBy('name_en')->get();
            $countries_data = ResourcesCountry::collection($countries_collection)->toArray(request());

            return view('role', [
                'entity' => $entity,
                'user' => $user_data,
                'vehicles' => $vehicles_data,
                'countries' => $countries_data,
            ]);
        }
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => ['required', 'string', 'max:255', 'unique:users_roles,role_name',],
        ]);

        UserRole::create([
            'role_name' => $request->role_name,
            'role_description' => $request->status_description,
        ]);

        return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
    }

    /**
     * POST: Add role
     *
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeEntity(Request $request, $entity)
    {
        if ($entity == 'manage-roles') {
            $request->validate([
                'role_name' => ['required', 'string', 'max:255', 'unique:users_roles,role_name'],
            ]);

            UserRole::create([
                'role_name' => $request->role_name,
                'role_description' => $request->role_description,
            ]);

            return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
        }

        if ($entity == 'users') {
            $inputs = [
                'status_id' => $this::$activated_status->id,
                'role_id' => $request->role_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'surname' => $request->surname,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthdate' => !empty($request->birthdate) ? (str_replace('_', '-', app()->getLocale()) == 'fr' ? explode('/', $request->birthdate)[2] . '-' . explode('/', $request->birthdate)[1] . '-' . explode('/', $request->birthdate)[0] : explode('/', $request->birthdate)[2] . '-' . explode('/', $request->birthdate)[0] . '-' . explode('/', $request->birthdate)[1]) : null,
                'country_id' => $request->country_id,
                'city' => $request->city,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'p_o_box' => $request->p_o_box,
                'belongs_to' => $request->belongs_to,
                'password' => !empty($request->password) ? Hash::make($request->password) : null,
            ];
            $users = User::all();
            $password_resets = PasswordReset::all();

            // If "email" and "phone" are NULL, return error
            if (trim($inputs['email']) == null and trim($inputs['phone']) == null) {
                return $this->handleError($inputs['phone'], __('validation.custom.email_or_phone.required'), 400);
            }

            if ($inputs['email'] != null) {
                // Check if user phone already exists
                foreach ($users as $another_user):
                    if ($another_user->phone == $inputs['email']) {
                        return $this->handleError($inputs['phone'], __('validation.custom.email.exists'), 400);
                    }
                endforeach;

                // If email exists in "password_reset" table, delete it
                if ($password_resets != null) {
                    foreach ($password_resets as $password_reset):
                        if ($password_reset->email == $inputs['email']) {
                            $password_reset->delete();
                        }
                    endforeach;
                }
            }

            if ($inputs['phone'] != null) {
                // Check if user phone already exists
                foreach ($users as $another_user):
                    if ($another_user->phone == $inputs['phone']) {
                        return $this->handleError($inputs['phone'], __('validation.custom.phone.exists'), 400);
                    }
                endforeach;

                // If phone exists in "password_reset" table, delete it
                if ($password_resets != null) {
                    foreach ($password_resets as $password_reset):
                        if ($password_reset->phone == $inputs['phone']) {
                            $password_reset->delete();
                        }
                    endforeach;
                }
            }

            if ($inputs['username'] != null) {
                // Check if username already exists
                foreach ($users as $another_user):
                    if ($another_user->username == $inputs['username']) {
                        return $this->handleError($inputs['username'], __('validation.custom.username.exists'), 400);
                    }
                endforeach;
            }

            // If it is a driver, check if the vehicle owner (with role "Professional") exists
            if ($inputs['belongs_to'] != null) {
                $parent = User::find($inputs['belongs_to']);

                if (is_null($parent)) {
                    return $this->handleError(__('notifications.find_parent_404'));
                }
            }

            if ($inputs['password'] != null) {
                if ($request->confirm_password != $request->password or $request->confirm_password == null) {
                    return $this->handleError($request->confirm_password, __('notifications.confirm_password_error'), 400);
                }

                $random_int_stringified = (string) random_int(1000000, 9999999);

                if ($inputs['email'] != null and $inputs['phone'] != null) {
                    $password_reset = PasswordReset::create([
                        'email' => $inputs['email'],
                        'phone' => $inputs['phone'],
                        'token' => $random_int_stringified,
                        'former_password' => $request->password,
                    ]);

                } else {
                    if ($inputs['email'] != null and $inputs['phone'] == null) {
                        $password_reset = PasswordReset::create([
                            'email' => $inputs['email'],
                            'token' => $random_int_stringified,
                            'former_password' => $request->password,
                        ]);
                    }

                    if ($inputs['email'] == null and $inputs['phone'] != null) {
                        $password_reset = PasswordReset::create([
                            'phone' => $inputs['phone'],
                            'token' => $random_int_stringified,
                            'former_password' => $request->password,
                        ]);
                    }
                }
            }

            if ($inputs['password'] == null) {
                $random_int_stringified = (string) random_int(1000000, 9999999);

                if ($inputs['email'] != null and $inputs['phone'] != null) {
                    $password_reset = PasswordReset::create([
                        'email' => $inputs['email'],
                        'phone' => $inputs['phone'],
                        'token' => $random_int_stringified,
                        'former_password' => Random::generate(10, 'a-zA-Z'),
                    ]);

                    $inputs['password'] = Hash::make($password_reset->former_password);

                } else {
                    if ($inputs['email'] != null and $inputs['phone'] == null) {
                        $password_reset = PasswordReset::create([
                            'email' => $inputs['email'],
                            'token' => $random_int_stringified,
                            'former_password' => Random::generate(10, 'a-zA-Z'),
                        ]);

                        $inputs['password'] = Hash::make($password_reset->former_password);
                    }

                    if ($inputs['email'] == null and $inputs['phone'] != null) {
                        $password_reset = PasswordReset::create([
                            'phone' => $inputs['phone'],
                            'token' => $random_int_stringified,
                            'former_password' => Random::generate(10, 'a-zA-Z'),
                        ]);

                        $inputs['password'] = Hash::make($password_reset->former_password);
                    }
                }
            }

            $user = User::create($inputs);
            // $token = $user->createToken('auth_token')->plainTextToken;

            // $user->update([
            //     'api_token' => $token,
            //     'updated_at' => now(),
            // ]);

            if ($request->data_other_user != null) {
                // $extension = explode('/', explode(':', substr($request->data_other_user, 0, strpos($request->data_other_user, ';')))[1])[1];
                $replace = substr($request->data_other_user, 0, strpos($request->data_other_user, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->data_other_user);
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

            $object = new stdClass();
            $object->password_reset = new ResourcesPasswordReset($password_reset);
            $object->user = new ResourcesUser($user);

            return $this->handleResponse($object, __('notifications.create_user_success'));
        }
    }

    /**
     * POST: Update role
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $role = UserRole::find($id);

        $role->update([
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
        ]);

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
    }

    /**
     * POST: Update role
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEntity(Request $request, $entity, $id)
    {
        if ($entity == 'manage-roles') {
            $role = UserRole::find($id);

            if ($request->role_name != null) {
                $role->update([
                    'updated_at' => now(),
                    'role_name' => $request->role_name,
                ]);
            }

            if ($request->role_description != null) {
                $role->update([
                    'updated_at' => now(),
                    'role_description' => $request->role_description,
                ]);
            }

            return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
        }

        if ($entity == 'users') {
            $user = User::find($id);
            $users = User::all();

            if ($request->status_id != null) {
                $user->update([
                    'status_id' => $request->status_id,
                    'updated_at' => now(),
                ]);
            }

            if ($request->role_id != null) {
                $user->update([
                    'role_id' => $request->role_id,
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
                                return $this->handleError($request->username, __('validation.custom.username.exists'), 400);
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
                                return $this->handleError($request->email, __('validation.custom.email.exists'), 400);
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
                                return $this->handleError($request->phone, __('validation.custom.phone.exists'), 400);
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

            if ($request->country_id != null) {
                $user->update([
                    'country_id' => $request->country_id,
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

            if ($request->belongs_to != null) {
                $user->update([
                    'belongs_to' => $request->belongs_to,
                    'updated_at' => now(),
                ]);
            }

            if ($request->password != null) {
                if ($request->confirm_password != $request->password or $request->confirm_password == null) {
                    return $this->handleError($request->confirm_password, __('notifications.confirm_password_error'), 400);
                }

                if (!empty($current_user->email)) {
                    $password_reset = PasswordReset::where('email', $user->email)->first();
                    $random_int_stringified = (string) random_int(1000000, 9999999);

                    // If password_reset exists, update it
                    if ($password_reset != null) {
                        $password_reset->update([
                            'token' => $random_int_stringified,
                            'former_password' => $request->password,
                            'updated_at' => now(),
                        ]);
                    }

                } else {
                    if (!empty($current_user->phone)) {
                        $password_reset = PasswordReset::where('phone', $user->phone)->first();
                        $random_int_stringified = (string) random_int(1000000, 9999999);

                        // If password_reset exists, update it
                        if ($password_reset != null) {
                            $password_reset->update([
                                'token' => $random_int_stringified,
                                'former_password' => $request->password,
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }

                $user->update([
                    'password' => Hash::make($request->password),
                    'updated_at' => now(),
                ]);
            }

            if ($request->data_other_user != null) {
                // $extension = explode('/', explode(':', substr($request->data_other_user, 0, strpos($request->data_other_user, ';')))[1])[1];
                $replace = substr($request->data_other_user, 0, strpos($request->data_other_user, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->data_other_user);
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

            return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
        }
    }

    // ==================================== HTTP DELETE METHODS ====================================
    /**
     * DELETE: Remove role
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }

    /**
     * DELETE: Remove role
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyEntity($entity, $id)
    {
        if ($entity == 'manage-roles') {
            $role = UserRole::find($id);

            $role->delete();

            return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
        }

        if ($entity == 'users') {
            $user = User::find($id);
            $directory = $_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/users/' . $user->id;

            $user->delete();

            if (Storage::exists($directory)) {
                Storage::deleteDirectory($directory);
            }

            return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
        }
    }
}

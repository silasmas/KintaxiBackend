<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class RoleController extends Controller
{
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
            $countries = Country::orderBy('name')->get();
            $roles = UserRole::all();

            return view('role', [
                'entity' => $entity,
                'countries' => $countries,
                'roles' => $roles,
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
            $current_role = UserRole::find($id);

            return view('role', [
                'entity' => $entity,
                'current_role' => $current_role
            ]);
        }

        if ($entity == 'users') {
            $user = User::find($id);

            return view('role', [
                'entity' => $entity,
                'user' => $user,
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

            $role->update([
                'role_name' => $request->role_name,
                'role_description' => $request->role_description,
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
        }

        if ($entity == 'users') {
            $user = User::find($id);

            $user->update([
                'status_id' => $request->status_id,
                'role_id' => $request->role_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'surname' => $request->surname,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'country_id' => $request->country_id,
                'city' => $request->city,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'p_o_box' => $request->p_o_box,
                'belongs_to' => $request->belongs_to,
                'updated_at' => now(),
            ]);

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

            $user->delete();

            return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
        }
    }
}

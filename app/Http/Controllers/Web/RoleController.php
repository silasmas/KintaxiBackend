<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
        return view('role');
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
            return view('role');
        }

        if ($entity == 'users') {
            return view('role');
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
        $current_role = UserRole::find($id);

        return view('role', compact('current_role'));
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
            return view('role');
        }

        if ($entity == 'users') {
            return view('role');
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
        // 
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
        // 
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
        // 
    }
}

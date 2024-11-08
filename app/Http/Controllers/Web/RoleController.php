<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
        return view('role');
    }

    /**
     * GET: Role datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('role');
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
        return view('role');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 
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
        // 
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

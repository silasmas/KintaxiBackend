<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class VehicleController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Vehicle page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('vehicle');
    }

    /**
     * GET: Vehicle entity page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function indexEntity($entity)
    {
        return view('vehicle');
    }

    /**
     * GET: Vehicle datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('vehicle');
    }

    /**
     * GET: Vehicle entity datas page
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function showEntity($entity, $id)
    {
        return view('vehicle');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add vehicle
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * POST: Add vehicle entity
     *
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeEntity(Request $request, $entity)
    {
        // 
    }

    /**
     * POST: Update vehicle
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * POST: Update vehicle entity
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
     * DELETE: Remove vehicle
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }

    /**
     * DELETE: Remove vehicle entity
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

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class CustomerController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Customer page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customer');
    }

    /**
     * GET: Customer entity page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function indexEntity($entity)
    {
        return view('customer');
    }

    /**
     * GET: Customer datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('customer');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add customer
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * POST: Update customer
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // 
    }

    // ==================================== HTTP DELETE METHODS ====================================
    /**
     * DELETE: Remove customer
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }
}

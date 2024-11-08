<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class StatusController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Status page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('status');
    }

    /**
     * GET: Status datas page
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('status');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add status
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * POST: Update status
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
     * DELETE: Remove status
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }
}

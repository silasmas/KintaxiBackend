<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class PaymentGatewayController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Gateway page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('gateway');
    }

    /**
     * GET: Gateway datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('gateway');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add gateway
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * POST: Update gateway
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
     * DELETE: Remove gateway
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class CurrencyController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Currency page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('currency');
    }

    /**
     * GET: Currency datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('currency');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add currency
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * POST: Update currency
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
     * DELETE: Remove currency
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }
}

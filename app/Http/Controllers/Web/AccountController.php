<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('account');
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
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEntity(Request $request, $entity)
    {
        // 
    }
}

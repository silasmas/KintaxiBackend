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
    public function account()
    {
        return view('account');
    }

    /**
     * GET: Account entity page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function accountEntity($entity)
    {
        return view('account');
    }

    // ==================================== HTTP PUT METHODS ====================================
    /**
     * PUT: Update account
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAccount(Request $request)
    {
        // 
    }

    /**
     * PUT: Update account entity
     *
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAccountEntity(Request $request, $entity)
    {
        // 
    }
}

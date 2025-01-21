<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Country as ResourcesCountry;
use App\Models\Country;
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
        if ($entity == 'account_settings') {
            $countries_collection = Country::orderBy('name_' . app()->getLocale())->get();
            $countries_data = ResourcesCountry::collection($countries_collection)->toArray(request());

            return view('account', [
                'countries' => $countries_data,
                'entity'=> $entity,
                'entity_title'=> __('miscellaneous.menu.account.title'),
            ]);
        }

        if ($entity == 'password_update') {
            return view('account', [
                'entity'=> $entity,
                'entity_title'=> __('miscellaneous.account.update_password.title'),
            ]);
        }
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

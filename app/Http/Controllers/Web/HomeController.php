<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class HomeController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Change language
     *
     * @param  string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }

    /**
     * GET: Generate symbolic link for images
     *
     * @return \Illuminate\View\View
     */
    public function symlink()
    {
        return view('symlink');
    }

    /**
     * GET: About page
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * GET: Search page
     *
     * @return \Illuminate\View\View
     */
    public function search()
    {
        return view('search');
    }

    /**
     * GET: Customer page
     *
     * @return \Illuminate\View\View
     */
    public function customer()
    {
        return view('customer');
    }

    /**
     * GET: Customer datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function customerDatas($id)
    {
        return view('customer');
    }

    /**
     * GET: Customer entity page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function customerEntity($entity)
    {
        return view('customer');
    }

    /**
     * GET: Currency page
     *
     * @return \Illuminate\View\View
     */
    public function currency()
    {
        return view('currency');
    }

    /**
     * GET: Currency datas page
     *
     * @return \Illuminate\View\View
     */
    public function currencyDatas()
    {
        return view('currency');
    }

    /**
     * GET: Gateway page
     *
     * @return \Illuminate\View\View
     */
    public function gateway()
    {
        return view('gateway');
    }

    /**
     * GET: Gateway datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function gatewayDatas($id)
    {
        return view('gateway');
    }

    /**
     * GET: Vehicle page
     *
     * @return \Illuminate\View\View
     */
    public function vehicle()
    {
        return view('vehicle');
    }

    /**
     * GET: Vehicle datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function vehicleDatas($id)
    {
        return view('vehicle');
    }

    /**
     * GET: Vehicle datas page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function vehicleEntity($entity)
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
    public function vehicleEntityDatas($entity, $id)
    {
        return view('vehicle');
    }

    /**
     * GET: Role page
     *
     * @return \Illuminate\View\View
     */
    public function role()
    {
        return view('role');
    }

    /**
     * GET: Role datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function roleDatas($id)
    {
        return view('role');
    }

    /**
     * GET: Role datas page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function roleEntity($entity)
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
    public function roleEntityDatas($entity, $id)
    {
        return view('role');
    }

    /**
     * GET: Status page
     *
     * @return \Illuminate\View\View
     */
    public function status()
    {
        return view('status');
    }

    /**
     * GET: Status datas page
     *
     * @return \Illuminate\View\View
     */
    public function statusDatas()
    {
        return view('status');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add customer
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCustomer(Request $request)
    {
        // 
    }

    /**
     * POST: Add currency
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCurrency(Request $request)
    {
        // 
    }

    /**
     * POST: Add gateway
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addGateway(Request $request)
    {
        // 
    }

    /**
     * POST: Add vehicle
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addVehicle(Request $request)
    {
        // 
    }

    /**
     * POST: Add vehicle entity
     *
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addVehicleEntity(Request $request, $entity)
    {
        // 
    }

    /**
     * POST: Add role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRole(Request $request)
    {
        // 
    }

    /**
     * POST: Add role
     *
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRoleEntity(Request $request, $entity)
    {
        // 
    }

    /**
     * POST: Add status
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addStatus(Request $request)
    {
        // 
    }

    // ==================================== HTTP PUT METHODS ====================================
    /**
     * PUT: Update customer
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCustomer(Request $request, $id)
    {
        // 
    }

    /**
     * PUT: Update currency
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCurrency(Request $request, $id)
    {
        // 
    }

    /**
     * PUT: Update gateway
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateGateway(Request $request, $id)
    {
        // 
    }

    /**
     * PUT: Update vehicle
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateVehicle(Request $request, $id)
    {
        // 
    }

    /**
     * PUT: Update vehicle
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateVehicleEntity(Request $request, $entity, $id)
    {
        // 
    }

    /**
     * PUT: Update role
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(Request $request, $id)
    {
        // 
    }

    /**
     * PUT: Update role
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRoleEntity(Request $request, $entity, $id)
    {
        // 
    }

    /**
     * PUT: Update role
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
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
    public function removeCustomer($id)
    {
        // 
    }

    /**
     * DELETE: Remove currency
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeCurrency($id)
    {
        // 
    }

    /**
     * DELETE: Remove gateway
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeGateway($id)
    {
        // 
    }

    /**
     * DELETE: Remove vehicle
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeVehicle($id)
    {
        // 
    }

    /**
     * DELETE: Remove vehicle
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeVehicleEntity($entity, $id)
    {
        // 
    }

    /**
     * DELETE: Remove role
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeRole($id)
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
    public function removeRoleEntity($entity, $id)
    {
        // 
    }

    /**
     * DELETE: Remove status
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteStatus($id)
    {
        // 
    }
}

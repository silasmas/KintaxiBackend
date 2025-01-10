<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Http\Resources\Vehicle as ResourcesVehicle;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * GET: Home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $vehicles_collection = Vehicle::limit(5)->orderByDesc('updated_at')->get();
        // $vehicles_data = ResourcesVehicle::collection($vehicles_collection)->toArray(request());
        $users_collection = User::where('id', '<>', Auth::user()->id)->limit(5)->orderByDesc('updated_at')->get();
        $users_data = ResourcesUser::collection($users_collection)->toArray(request());

        return view('dashboard', [
            // 'vehicles' => $vehicles_data,
            'users' => $users_data,
        ]);
        // return view('dashboard');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        return view('search');
    }
}

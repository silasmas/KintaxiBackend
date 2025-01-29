<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Currency as ResourcesCurrency;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $currency_request = Currency::find($id);
        $current_currency_resource = new ResourcesCurrency($currency_request);
        $current_currency = $current_currency_resource->toArray(request());

        return view('currency', compact('current_currency'));
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add currency
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency_name' => ['required', 'string', 'max:255', 'unique:currencies,currency_name',],
        ]);

        $currency = Currency::create([
            'created_by' => Auth::user()->id,
            'currency_name' => $request->currency_name,
            'currency_acronym' => $request->currency_acronym,
            'rating' => $request->rating
        ]);

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $file_name = Str::random(3) . '.' . $image->getClientOriginalExtension();
            $file_url = 'images/currencies/' . $currency->id . '/' . $file_name;
            // Upload file
            $dir_result = Storage::disk('public')->putFileAs('images/currencies/' . $currency->id, $image, $file_name);
            $dir_result = Storage::url($file_url);

            $currency->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'icon' => $dir_result,
            ]);
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
    }

    /**
     * POST: Update currency
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $currency = Currency::find($id);

        if ($request->currency_name != null) {
            $currency->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'currency_name' => $request->currency_name,
            ]);
        }

        if ($request->currency_acronym != null) {
            $currency->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'currency_acronym' => $request->currency_acronym,
            ]);
        }

        if ($request->rating != null) {
            $currency->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'rating' => $request->rating,
            ]);
        }

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $file_name = Str::random(3) . '.' . $image->getClientOriginalExtension();
            $file_url = 'images/currencies/' . $currency->id . '/' . $file_name;
            // Upload file
            $dir_result = Storage::disk('public')->putFileAs('images/currencies/' . $currency->id, $image, $file_name);
            $dir_result = Storage::url($file_url);

            $currency->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'icon' => $dir_result,
            ]);
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
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
        $currency = Currency::find($id);

        $currency->delete();

        return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
    }
}

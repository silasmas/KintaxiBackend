<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $current_status = Status::find($id);

        return view('status', compact('current_status'));
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add status
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'status_name' => ['required', 'string', 'max:255', 'unique:status,status_name',],
        ]);

        Status::create([
            'status_name' => $request->status_name,
            'status_description' => $request->status_description,
            'icon' => $request->icon,
            'color' => $request->color,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
    }

    /**
     * POST: Update status
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $status = Status::find($id);

        $status->update([
            'status_name' => $request->status_name,
            'status_description' => $request->status_description,
            'icon' => $request->icon,
            'color' => $request->color,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
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
        $status = Status::find($id);

        $status->delete();

        return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
    }
}

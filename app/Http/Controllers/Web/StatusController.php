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
            'created_by' => Auth::user()->id,
            'status_name' => $request->status_name,
            'status_description' => $request->status_description,
            'icon' => $request->icon,
            'color' => $request->color,
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

        if ($request->status_name != null) {
            $status->update([
                'updated_at' => now(),
                'status_name' => $request->status_name,
            ]);
        }

        if ($request->status_description != null) {
            $status->update([
                'updated_at' => now(),
                'status_description' => $request->status_description,
            ]);
        }

        if ($request->icon != null) {
            $status->update([
                'updated_at' => now(),
                'icon' => $request->icon,
            ]);
        }

        if ($request->color != null) {
            $status->update([
                'updated_at' => now(),
                'color' => $request->color,
            ]);
        }

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

        if (!$status) {
            return response()->json([
                'success' => false,
                'message' => __('notifications.find_status_404'),
            ], 404);
        }

        $status->delete();

        return response()->json([
            'success' => true,
            'message' => __('miscellaneous.delete_success'),
        ]);
    }
}

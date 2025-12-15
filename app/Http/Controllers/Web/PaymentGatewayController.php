<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentGateway as ResourcesPaymentGateway;
use App\Models\PaymentGateway;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class PaymentGatewayController extends Controller
{
    public static $activated_status;

    public function __construct()
    {
        $this::$activated_status = Status::where('status_name', 'activé/confirmé/récu')->first();
    }

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
        $gateway_request = PaymentGateway::find($id);
        $current_gateway_resource = new ResourcesPaymentGateway($gateway_request);
        $current_gateway = $current_gateway_resource->toArray(request());

        return view('gateway', compact('current_gateway'));
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add gateway
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'gateway_name' => ['required', 'string', 'max:255', 'unique:payment_gateways,gateway_name',],
        ]);

        PaymentGateway::create([
            'created_by' => Auth::user()->id,
            'status_id' => $this::$activated_status->id,
            'gateway_name' => $request->gateway_name,
        ]);

        return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
    }

    /**
     * POST: Update gateway
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $gateway = PaymentGateway::find($id);

        if ($request->status_id != null) {
            $gateway->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'status_id' => $request->status_id,
            ]);
        }

        if ($request->gateway_name != null) {
            $gateway->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'gateway_name' => $request->gateway_name,
            ]);
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
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
        $gateway = PaymentGateway::find($id);

        if (!$gateway) {
            return response()->json([
                'success' => false,
                'message' => __('notifications.find_payment_gateway_404'),
            ], 404);
        }

        $gateway->delete();

        return response()->json([
            'success' => true,
            'message' => __('miscellaneous.delete_success'),
        ]);
    }
}

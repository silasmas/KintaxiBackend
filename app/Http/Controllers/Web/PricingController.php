<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\PricingRule as ResourcesPricingRule;
use App\Models\PricingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class PricingController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Pricing page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pricing');
    }

    /**
     * GET: Pricing datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pricing_request = PricingRule::find($id);
        $current_pricing_resource = new ResourcesPricingRule($pricing_request);
        $current_pricing = $current_pricing_resource->toArray(request());

        return view('pricing', compact('current_pricing'));
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add currency
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        PricingRule::create([
            'created_by' => Auth::user()->id,
            'rule_type' => $request->rule_type,
            'min_value' => $request->min_value,
            'max_value' => $request->max_value,
            'cost' => $request->cost,
            'vehicle_category' => $request->vehicle_category,
            'surge_multiplier' => $request->surge_multiplier,
            'unit' => $request->unit,
            'zone_id' => $request->zone_id,
            'valid_from' => $request->valid_from,
            'valid_to' => $request->valid_to,
            'is_default' => $request->is_default,
        ]);

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
        $pricing = PricingRule::find($id);

        if ($request->rule_type != null) {
            if (!$pricing) {
                return response()->json([
                    'success' => false,
                    'message' => __('notifications.find_pricing_rule_404'),
                ]);
            }

            if (trim($request->rule_type) == null) {
                return response()->json([
                    'success' => false,
                    'message' => __('validation.required', ['attribute' => __('miscellaneous.admin.pricing.data.rule_type.title')]),
                ]);
            }

            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'rule_type' => $request->rule_type,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('notifications.update_pricing_rule_success'),
            ]);
        }

        if ($request->min_value != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'min_value' => $request->min_value,
            ]);
        }

        if ($request->max_value != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'max_value' => $request->max_value,
            ]);
        }

        if ($request->cost != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'cost' => $request->cost,
            ]);
        }

        if ($request->vehicle_category != null) {
            if (!$pricing) {
                return response()->json([
                    'success' => false,
                    'message' => __('notifications.find_pricing_rule_404'),
                ]);
            }

            if (trim($request->vehicle_category) == null OR !is_numeric($request->vehicle_category)) {
                return response()->json([
                    'success' => false,
                    'message' => __('validation.numeric', ['attribute' => __('miscellaneous.admin.pricing.data.vehicle_category')]),
                ]);
            }

            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'vehicle_category' => $request->vehicle_category,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('notifications.update_pricing_rule_success'),
            ]);
        }

        if ($request->surge_multiplier != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'surge_multiplier' => $request->surge_multiplier,
            ]);
        }

        if ($request->unit != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'unit' => $request->unit,
            ]);
        }

        if ($request->zone_id != null) {
            if (!$pricing) {
                return response()->json([
                    'success' => false,
                    'message' => __('notifications.find_pricing_rule_404'),
                ]);
            }

            if (trim($request->zone_id) == null) {
                return response()->json([
                    'success' => false,
                    'message' => __('validation.required', ['attribute' => __('miscellaneous.admin.pricing.data.zone_id')]),
                ]);
            }

            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'zone_id' => $request->zone_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('notifications.update_pricing_rule_success'),
            ]);
        }

        if ($request->valid_from != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'valid_from' => $request->valid_from,
            ]);
        }

        if ($request->valid_to != null) {
            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'valid_to' => $request->valid_to,
            ]);
        }

        if ($request->is_default != null) {
            if (!$pricing) {
                return response()->json([
                    'success' => false,
                    'message' => __('notifications.find_pricing_rule_404'),
                ]);
            }

            if (trim($request->is_default) == null OR !is_numeric($request->is_default)) {
                return response()->json([
                    'success' => false,
                    'message' => __('validation.numeric', ['attribute' => __('miscellaneous.admin.pricing.data.is_default')]),
                ]);
            }

            $pricing->update([
                'updated_at' => now(),
                'updated_by' => Auth::user()->id,
                'is_default' => $request->is_default,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('notifications.update_pricing_rule_success'),
            ]);
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
    }

    // ==================================== HTTP DELETE METHODS ====================================
    /**
     * DELETE: Remove pricing
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pricing = PricingRule::find($id);

        if (!$pricing) {
            return response()->json([
                'success' => false,
                'message' => __('notifications.find_pricing_rule_404'),
            ], 404);
        }

        $pricing->delete();

        return response()->json([
            'success' => true,
            'message' => __('miscellaneous.delete_success'),
        ]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Ride;
use App\Http\Resources\Ride as ResourcesRide;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class RideController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rides = Ride::all();

        return $this->handleResponse(ResourcesRide::collection($rides), __('notifications.find_all_rides_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get inputs
        $inputs = [
            'ride_status' => $request->ride_status,
            'vehicle_category_id' => $request->vehicle_category_id,
            'vehicle_id' => $request->vehicle_id,
            'passenger_id' => $request->passenger_id,
            'driver_id' => $request->driver_id,
            'distance' => $request->distance,
            'cost' => $request->cost,
            'estimated_cost' => $request->estimated_cost,
            'payment_method' => $request->payment_method,
            'commission' => $request->commission,
            'start_location' => $request->start_location,
            'end_location' => $request->end_location,
            'pickup_location' => $request->pickup_location,
            'pickup_data' => $request->pickup_data,
            'driver_location' => $request->driver_location,
            'estimated_duration' => $request->estimated_duration,
            'actual_duration' => $request->actual_duration,
            'waiting_time' => $request->waiting_time,
            'is_scheduled' => $request->is_scheduled,
            'scheduled_time' => $request->scheduled_time
        ];

        $ride = Ride::create($inputs);

        return $this->handleResponse(new ResourcesRide($ride), __('notifications.create_ride_success'));
    }

    /**
     * Display the specified resource.
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ride = Ride::find($id);

        if (is_null($ride)) {
            return $this->handleError(__('notifications.find_ride_404'));
        }

        return $this->handleResponse(new ResourcesRide($ride), __('notifications.find_ride_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ride $ride)
    {
        // Get inputs
        $inputs = [
            'ride_status' => $request->ride_status,
            'vehicle_category_id' => $request->vehicle_category_id,
            'vehicle_id' => $request->vehicle_id,
            'passenger_id' => $request->passenger_id,
            'driver_id' => $request->driver_id,
            'distance' => $request->distance,
            'cost' => $request->cost,
            'estimated_cost' => $request->estimated_cost,
            'payment_method' => $request->payment_method,
            'commission' => $request->commission,
            'start_location' => $request->start_location,
            'end_location' => $request->end_location,
            'pickup_location' => $request->pickup_location,
            'pickup_data' => $request->pickup_data,
            'driver_location' => $request->driver_location,
            'estimated_duration' => $request->estimated_duration,
            'actual_duration' => $request->actual_duration,
            'waiting_time' => $request->waiting_time,
            'is_scheduled' => $request->is_scheduled,
            'scheduled_time' => $request->scheduled_time
        ];

        if ($inputs['ride_status'] != null) {
            $ride->update([
                'ride_status' => $inputs['ride_status'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['vehicle_category_id'] != null) {
            $ride->update([
                'vehicle_category_id' => $inputs['vehicle_category_id'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['vehicle_id'] != null) {
            $ride->update([
                'vehicle_id' => $inputs['vehicle_id'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['passenger_id'] != null) {
            $ride->update([
                'passenger_id' => $inputs['passenger_id'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['driver_id'] != null) {
            $ride->update([
                'driver_id' => $inputs['driver_id'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['distance'] != null) {
            $ride->update([
                'distance' => $inputs['distance'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['cost'] != null) {
            $ride->update([
                'cost' => $inputs['cost'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['estimated_cost'] != null) {
            $ride->update([
                'estimated_cost' => $inputs['estimated_cost'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['payment_method'] != null) {
            $ride->update([
                'payment_method' => $inputs['payment_method'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['commission'] != null) {
            $ride->update([
                'commission' => $inputs['commission'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['start_location'] != null) {
            $ride->update([
                'start_location' => $inputs['start_location'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['end_location'] != null) {
            $ride->update([
                'end_location' => $inputs['end_location'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['pickup_location'] != null) {
            $ride->update([
                'pickup_location' => $inputs['pickup_location'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['pickup_data'] != null) {
            $ride->update([
                'pickup_data' => $inputs['pickup_data'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['driver_location'] != null) {
            $ride->update([
                'driver_location' => $inputs['driver_location'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['estimated_duration'] != null) {
            $ride->update([
                'estimated_duration' => $inputs['estimated_duration'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['actual_duration'] != null) {
            $ride->update([
                'actual_duration' => $inputs['actual_duration'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['waiting_time'] != null) {
            $ride->update([
                'waiting_time' => $inputs['waiting_time'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['is_scheduled'] != null) {
            $ride->update([
                'is_scheduled' => $inputs['is_scheduled'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['scheduled_time'] != null) {
            $ride->update([
                'scheduled_time' => $inputs['scheduled_time'],
                'updated_at' => now(),
            ]);
        }

        return $this->handleResponse(new ResourcesRide($ride), __('notifications.update_ride_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        $ride->delete();

        $rides = Ride::all();

        return $this->handleResponse(ResourcesRide::collection($rides), __('notifications.delete_ride_success'));
    }

    // ==================================== CUSTOM METHODS ====================================
    /**
     * Find a status by its name.
     *
     * @param  string $status
     * @return \Illuminate\Http\Response
     */
    public function ridesByStatus($status)
    {
        $rides = Ride::where('ride_status', $status)->get();
        $count_rides = Ride::where('ride_status', $status)->count();

        return $this->handleResponse(ResourcesRide::collection($rides), __('notifications.find_all_rides_success'), null, $count_rides);
    }
}

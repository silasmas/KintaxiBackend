<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Vehicle as ResourcesVehicle;
use App\Http\Resources\VehicleCategory as ResourcesVehicleCategory;
use App\Http\Resources\VehicleFeature as ResourcesVehicleFeature;
use App\Http\Resources\VehicleShape as ResourcesVehicleShape;
use App\Models\File;
use App\Models\Status;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleFeature;
use App\Models\VehicleShape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class VehicleController extends Controller
{
    public static $activated_status;

    public function __construct()
    {
        $this::$activated_status = Status::where('status_name', 'activé/confirmé/récu')->first();
    }

    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Vehicle page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicles_collection = Vehicle::all();
        $vehicles_data = ResourcesVehicle::collection($vehicles_collection)->toArray(request());

        return view('vehicle', [
            'vehicles' => $vehicles_data,
        ]);
    }

    /**
     * GET: Vehicle entity page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function indexEntity($entity)
    {
        if ($entity == 'shape') {
            $vehicle_shapes_collection = VehicleShape::all();
            $vehicle_shapes_data = ResourcesVehicleShape::collection($vehicle_shapes_collection)->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'vehicle_shapes' => $vehicle_shapes_data,
            ]);
        }

        if ($entity == 'category') {
            $vehicle_categories_collection = VehicleCategory::all();
            $vehicle_categories_data = ResourcesVehicleCategory::collection($vehicle_categories_collection)->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'vehicle_categories' => $vehicle_categories_data,
            ]);
        }

        if ($entity == 'features') {
            $vehicle_features_collection = VehicleFeature::all();
            $vehicle_features_data = ResourcesVehicleFeature::collection($vehicle_features_collection)->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'vehicle_features' => $vehicle_features_data,
            ]);
        }
    }

    /**
     * GET: Vehicle datas page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vehicle_request = Vehicle::find($id);
        $vehicle_resource = new ResourcesVehicle($vehicle_request);
        $vehicle_data = $vehicle_resource->toArray(request());

        return view('vehicle', [
            'vehicle' => $vehicle_data
        ]);
    }

    /**
     * GET: Vehicle entity datas page
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function showEntity($entity, $id)
    {
        if ($entity == 'shape') {
            $shape_request = VehicleShape::find($id);
            $shape_resource = new ResourcesVehicleShape($shape_request);
            $shape_data = $shape_resource->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'shape' => $shape_data,
            ]);
        }

        if ($entity == 'category') {
            $category_request = VehicleCategory::find($id);
            $category_resource = new ResourcesVehicleCategory($category_request);
            $category_data = $category_resource->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'category' => $category_data,
            ]);
        }

        if ($entity == 'features') {
            $feature_request = VehicleFeature::find($id);
            $feature_resource = new ResourcesVehicleFeature($feature_request);
            $feature_data = $feature_resource->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'feature' => $feature_data,
            ]);
        }
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Add vehicle
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create([
            'status_id' => $this::$activated_status->id,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'user_id' => $request->user_id,
            'model' => $request->model,
            'mark' => $request->mark,
            'color' => $request->color,
            'registration_number' => $request->registration_number,
            'regis_number_expiration' => $request->regis_number_expiration,
            'vin_number' => $request->vin_number,
            'manufacture_year' => $request->manufacture_year,
            'fuel_type' => $request->fuel_type,
            'cylinder_capacity' => $request->cylinder_capacity,
            'engine_power' => $request->engine_power,
            'shape_id' => $request->shape_id,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images_urls') != null) {
            foreach ($request->file('images_urls') as $key => $image):
                $file_url = 'images/vehicles/' . $vehicle->id . '/' . Str::random(50) . '.' . $image->extension();

                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $image));

                File::create([
                    'file_name' => trim($request->files_names[$key]) != null ? $request->files_names[$key] : null,
                    'file_url' => $dir_result,
                    'vehicle_id' => $vehicle->id
                ]);
            endforeach;
        }

        VehicleFeature::create([
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'vehicle_id' => $vehicle->id,
            'icon' => $request->icon,
            'is_clean' => $request->is_clean,
            'has_helmet' => $request->has_helmet,
            'has_airbags' => $request->has_airbags,
            'has_seat_belt' => $request->has_seat_belt,
            'has_ergonomic_seat' => $request->has_ergonomic_seat,
            'has_air_conditioning' => $request->has_air_conditioning,
            'has_suspensions' => $request->has_suspensions,
            'has_soundproofing' => $request->has_soundproofing,
            'has_sufficient_space' => $request->has_sufficient_space,
            'has_quality_equipment' => $request->has_quality_equipment,
            'has_on_board_technologies' => $request->has_on_board_technologies,
            'has_interior_lighting' => $request->has_interior_lighting,
            'has_practical_accessories' => $request->has_practical_accessories,
            'has_driving_assist_system' => $request->has_driving_assist_system,
        ]);

        return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
    }

    /**
     * POST: Add vehicle entity
     *
     * @param  string $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeEntity(Request $request, $entity)
    {
        if ($entity == 'shape') {
            $shape = VehicleShape::create([
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'shape_name' => $request->shape_name,
                'shape_description' => $request->shape_description,
            ]);

            if ($request->hasFile('photo')) {
                $file_url = 'images/vehicles/shapes/' . $shape->id . '/' . Str::random(50) . '.' . $request->file('file_url')->extension();

                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $request->file('photo')));

                $photo = File::create([
                    'file_name' => trim($request->file_name) != null ? $request->file_name : null,
                    'file_url' => $dir_result
                ]);

                $shape->update([
                    'photo' => $photo->id,
                    'updated_at' => now()
                ]);
            }

            return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
        }

        if ($entity == 'category') {
            VehicleCategory::create([
                'status_id' => $this::$activated_status->id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'image' => $request->image,
            ]);

            return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
        }

        if ($entity == 'features') {
            VehicleFeature::create([
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'vehicle_id' => $request->vehicle_id,
                'icon' => $request->icon,
                'is_clean' => $request->is_clean,
                'has_helmet' => $request->has_helmet,
                'has_airbags' => $request->has_airbags,
                'has_seat_belt' => $request->has_seat_belt,
                'has_ergonomic_seat' => $request->has_ergonomic_seat,
                'has_air_conditioning' => $request->has_air_conditioning,
                'has_suspensions' => $request->has_suspensions,
                'has_soundproofing' => $request->has_soundproofing,
                'has_sufficient_space' => $request->has_sufficient_space,
                'has_quality_equipment' => $request->has_quality_equipment,
                'has_on_board_technologies' => $request->has_on_board_technologies,
                'has_interior_lighting' => $request->has_interior_lighting,
                'has_practical_accessories' => $request->has_practical_accessories,
                'has_driving_assist_system' => $request->has_driving_assist_system,
            ]);

            return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
        }
    }

    /**
     * POST: Update vehicle
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        $vehicle->update([
            'status_id' => $request->status_id,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'user_id' => $request->user_id,
            'model' => $request->model,
            'mark' => $request->mark,
            'color' => $request->color,
            'registration_number' => $request->registration_number,
            'regis_number_expiration' => $request->regis_number_expiration,
            'vin_number' => $request->vin_number,
            'manufacture_year' => $request->manufacture_year,
            'fuel_type' => $request->fuel_type,
            'cylinder_capacity' => $request->cylinder_capacity,
            'engine_power' => $request->engine_power,
            'shape_id' => $request->shape_id,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images_urls') != null) {
            foreach ($request->file('images_urls') as $key => $image):
                $file_url = 'images/vehicles/' . $vehicle->id . '/' . Str::random(50) . '.' . $image->extension();

                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $image));

                File::create([
                    'file_name' => trim($request->files_names[$key]) != null ? $request->files_names[$key] : null,
                    'file_url' => $dir_result,
                    'vehicle_id' => $vehicle->id
                ]);
            endforeach;
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
    }

    /**
     * POST: Update vehicle entity
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEntity(Request $request, $entity, $id)
    {
        if ($entity == 'shape') {
            $shape = VehicleShape::find($id);

            $shape->update([
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'shape_name' => $request->shape_name,
                'shape_description' => $request->shape_description,
                'updated_at' => now(),
            ]);

            if ($request->hasFile('photo')) {
                $file_url = 'images/vehicles/shapes/' . $shape->id . '/' . Str::random(50) . '.' . $request->file('file_url')->extension();

                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $request->file('photo')));

                $photo = File::create([
                    'file_name' => trim($request->file_name) != null ? $request->file_name : null,
                    'file_url' => $dir_result
                ]);

                $shape->update([
                    'photo' => $photo->id,
                    'updated_at' => now()
                ]);
            }

            return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
        }

        if ($entity == 'category') {
            $category = VehicleCategory::find($id);

            $category->update([
                'status_id' => $request->status_id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
                'image' => $request->image,
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
        }

        if ($entity == 'features') {
            $feature = VehicleFeature::find($id);

            $feature->update([
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'vehicle_id' => $request->vehicle_id,
                'icon' => $request->icon,
                'is_clean' => $request->is_clean,
                'has_helmet' => $request->has_helmet,
                'has_airbags' => $request->has_airbags,
                'has_seat_belt' => $request->has_seat_belt,
                'has_ergonomic_seat' => $request->has_ergonomic_seat,
                'has_air_conditioning' => $request->has_air_conditioning,
                'has_suspensions' => $request->has_suspensions,
                'has_soundproofing' => $request->has_soundproofing,
                'has_sufficient_space' => $request->has_sufficient_space,
                'has_quality_equipment' => $request->has_quality_equipment,
                'has_on_board_technologies' => $request->has_on_board_technologies,
                'has_interior_lighting' => $request->has_interior_lighting,
                'has_practical_accessories' => $request->has_practical_accessories,
                'has_driving_assist_system' => $request->has_driving_assist_system,
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success_message', __('miscellaneous.data_updated'));
        }
    }

    // ==================================== HTTP DELETE METHODS ====================================
    /**
     * DELETE: Remove vehicle
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // 
    }

    /**
     * DELETE: Remove vehicle entity
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyEntity($entity, $id)
    {
        // 
    }
}

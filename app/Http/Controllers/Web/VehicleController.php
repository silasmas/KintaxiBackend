<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Status as ResourcesStatus;
use App\Http\Resources\Vehicle as ResourcesVehicle;
use App\Http\Resources\VehicleCategory as ResourcesVehicleCategory;
use App\Http\Resources\VehicleShape as ResourcesVehicleShape;
use App\Models\File;
use App\Models\Status;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleFeature;
use App\Models\VehicleShape;
use Illuminate\Filesystem\Filesystem;
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
    public static $created_status;

    public function __construct()
    {
        $this::$activated_status = Status::where('status_name', 'activé/confirmé/récu')->first();
        $this::$created_status = Status::where('status_name', 'créé/en attente de confirmation')->first();
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
            $statuses_collection = Status::all();
            $statuses_resource = ResourcesStatus::collection($statuses_collection);
            $statuses_data = $statuses_resource->toArray(request());

            return view('vehicle', [
                'entity' => $entity,
                'category' => $category_data,
                'statuses' => $statuses_data,
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

            if ($request->data_vehicle != null) {
                // $extension = explode('/', explode(':', substr($request->data_vehicle, 0, strpos($request->data_vehicle, ';')))[1])[1];
                $replace = substr($request->data_vehicle, 0, strpos($request->data_vehicle, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->data_vehicle);
                $image = str_replace(' ', '+', $image);

                // Clean "vehicles/shapes" directory
                $file = new Filesystem;
                $file->cleanDirectory($_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/shapes/' . $shape->id);
                // Create image URL
                $image_url = 'images/vehicles/shapes/' . $shape->id . '/' . Str::random(50) . '.png';

                // Upload image
                Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

                $shape->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'photo' => $image_url,
                ]);
            }
        }

        if ($entity == 'category') {
            $category = VehicleCategory::create([
                'status_id' => $this::$created_status->id,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'category_name' => $request->category_name,
                'category_description' => $request->category_description,
            ]);

            if ($request->data_vehicle != null) {
                // $extension = explode('/', explode(':', substr($request->data_vehicle, 0, strpos($request->data_vehicle, ';')))[1])[1];
                $replace = substr($request->data_vehicle, 0, strpos($request->data_vehicle, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->data_vehicle);
                $image = str_replace(' ', '+', $image);

                // Clean "vehicles/categories" directory
                $file = new Filesystem;
                $file->cleanDirectory($_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/categories/' . $category->id);
                // Create image URL
                $image_url = 'images/vehicles/categories/' . $category->id . '/' . Str::random(50) . '.png';

                // Upload image
                Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

                $category->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'image' => $image_url,
                ]);
            }
        }

        return redirect()->back()->with('success_message', __('miscellaneous.data_created'));
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

        if ($request->status_id != null) {
            $vehicle->update([
                'status_id' => $request->status_id,
                'updated_by' => Auth::user()->id,
            ]);
        }

        if ($request->user_id != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'user_id' => $request->user_id,
            ]);
        }

        if ($request->model != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'model' => $request->model,
            ]);
        }

        if ($request->mark != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'mark' => $request->mark,
            ]);
        }

        if ($request->color != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'color' => $request->color,
            ]);
        }

        if ($request->registration_number != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'registration_number' => $request->registration_number,
            ]);
        }

        if ($request->regis_number_expiration != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'regis_number_expiration' => $request->regis_number_expiration,
            ]);
        }

        if ($request->vin_number != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'vin_number' => $request->vin_number,
            ]);
        }

        if ($request->manufacture_year != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'manufacture_year' => $request->manufacture_year,
            ]);
        }

        if ($request->fuel_type != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'fuel_type' => $request->fuel_type,
            ]);
        }

        if ($request->cylinder_capacity != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'cylinder_capacity' => $request->cylinder_capacity,
            ]);
        }

        if ($request->engine_power != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'engine_power' => $request->engine_power,
            ]);
        }

        if ($request->shape_id != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'shape_id' => $request->shape_id,
            ]);
        }

        if ($request->category_id != null) {
            $vehicle->update([
                'updated_by' => Auth::user()->id,
                'category_id' => $request->category_id,
            ]);
        }

        if ($request->icon != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'icon' => $request->icon,
            ]);
        }

        if ($request->is_clean != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'is_clean' => $request->is_clean,
            ]);
        }

        if ($request->has_helmet != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_helmet' => $request->has_helmet,
            ]);
        }

        if ($request->has_airbags != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_airbags' => $request->has_airbags,
            ]);
        }

        if ($request->has_seat_belt != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_seat_belt' => $request->has_seat_belt,
            ]);
        }

        if ($request->has_ergonomic_seat != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_ergonomic_seat' => $request->has_ergonomic_seat,
            ]);
        }

        if ($request->has_air_conditioning != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_air_conditioning' => $request->has_air_conditioning,
            ]);
        }

        if ($request->has_suspensions != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_suspensions' => $request->has_suspensions,
            ]);
        }

        if ($request->has_soundproofing != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_soundproofing' => $request->has_soundproofing,
            ]);
        }

        if ($request->has_sufficient_space != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_sufficient_space' => $request->has_sufficient_space,
            ]);
        }

        if ($request->has_quality_equipment != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_quality_equipment' => $request->has_quality_equipment,
            ]);
        }

        if ($request->has_on_board_technologies != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_on_board_technologies' => $request->has_on_board_technologies,
            ]);
        }

        if ($request->has_interior_lighting != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_interior_lighting' => $request->has_interior_lighting,
            ]);
        }

        if ($request->has_practical_accessories != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_practical_accessories' => $request->has_practical_accessories,
            ]);
        }

        if ($request->has_driving_assist_system != null) {
            $vehicle_feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

            $vehicle_feature->update([
                'updated_by' => Auth::user()->id,
                'has_driving_assist_system' => $request->has_driving_assist_system,
            ]);
        }

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

            if ($request->shape_name != null) {
                $shape->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'shape_name' => $request->shape_name,
                ]);
            }

            if ($request->shape_description != null) {
                $shape->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'shape_description' => $request->shape_description,
                ]);
            }

            if ($request->data_vehicle != null) {
                // $extension = explode('/', explode(':', substr($request->data_vehicle, 0, strpos($request->data_vehicle, ';')))[1])[1];
                $replace = substr($request->data_vehicle, 0, strpos($request->data_vehicle, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->data_vehicle);
                $image = str_replace(' ', '+', $image);

                // Clean "vehicles/shapes" directory
                $file = new Filesystem;
                $file->cleanDirectory($_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/shapes/' . $shape->id);
                // Create image URL
                $image_url = 'images/vehicles/shapes/' . $shape->id . '/' . Str::random(50) . '.png';

                // Upload image
                Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

                $shape->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'photo' => $image_url,
                ]);
            }
        }

        if ($entity == 'category') {
            $category = VehicleCategory::find($id);

            if ($request->status_id != null) {
                $category->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'status_id' => $request->status_id,
                ]);
            }

            if ($request->category_name != null) {
                $category->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'category_name' => $request->category_name,
                ]);
            }

            if ($request->category_description != null) {
                $category->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'category_description' => $request->category_description,
                ]);
            }

            if ($request->data_vehicle != null) {
                // $extension = explode('/', explode(':', substr($request->data_vehicle, 0, strpos($request->data_vehicle, ';')))[1])[1];
                $replace = substr($request->data_vehicle, 0, strpos($request->data_vehicle, ',') + 1);
                // Find substring from replace here eg: data:image/png;base64,
                $image = str_replace($replace, '', $request->data_vehicle);
                $image = str_replace(' ', '+', $image);

                // Clean "vehicles/categories" directory
                $file = new Filesystem;
                $file->cleanDirectory($_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/categories/' . $category->id);
                // Create image URL
                $image_url = 'images/vehicles/categories/' . $category->id . '/' . Str::random(50) . '.png';

                // Upload image
                Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

                $category->update([
                    'updated_at' => now(),
                    'updated_by' => Auth::user()->id,
                    'image' => $image_url,
                ]);
            }
        }

        return redirect()->to('/vehicle/' . $entity)->with('success_message', __('miscellaneous.data_updated'));
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
        $vehicle = Vehicle::find($id);
        $directory = $_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/' . $vehicle->id;
        $feature = VehicleFeature::where('vehicle_id', $vehicle->id)->first();

        $feature->delete();
        $vehicle->delete();

        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
        }

        return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
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
        if ($entity == 'shape') {
            $shape = VehicleShape::find($id);
            $directory = $_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/shapes/' . $shape->id;

            $shape->delete();

            if (Storage::exists($directory)) {
                Storage::deleteDirectory($directory);
            }
        }

        if ($entity == 'category') {
            $category = VehicleCategory::find($id);
            $directory = $_SERVER['DOCUMENT_ROOT'] . '/public/storage/images/vehicles/categories/' . $category->id;

            $category->delete();

            if (Storage::exists($directory)) {
                Storage::deleteDirectory($directory);
            }
        }

        return redirect()->back()->with('success_message', __('miscellaneous.delete_success'));
    }
}

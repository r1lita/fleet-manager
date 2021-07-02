<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection; 
use Illuminate\Support\Facades\Validator;
use App\Services\VehicleService;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    
    protected $vehicleService;
    
    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'constructor_id' => 'sometimes|numeric',
            'model' => 'sometimes|min:2|max:100',
            'color' => 'sometimes|max:50',
            'vin' => 'sometimes|max:100' // official VIN length is 17
        ]);

        if ($validator->fails()) {
            return response()->json([
                $validator->errors()
            ], 422);
        }

        $vehicles = $this->vehicleService->all();
        return Response(VehicleResource::collection($vehicles), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = Vehicle::create($request->all());
        return new VehicleCollection($vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = $this->vehicleService->findById($id);
        return Response()->json([
            'data' => new VehicleResource($vehicle)
        ], 200);    
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Vehicle::find($id)->update($request->all());
        $vehicle = Vehicle::find($id);
        $vehicle->update($request->all());
        return $vehicle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Vehicle::destroy($id);
    }
}

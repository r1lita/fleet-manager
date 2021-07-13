<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehiclePostRequest;
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
        /** Validator for get search parameters */
        $validator = Validator::make($request->all(), [
            'constructor_id' => 'sometimes|numeric',
            'model' => 'sometimes|min:2|max:100',
            'color' => 'sometimes|max:50',
            'vin' => 'sometimes|max:100' // official VIN length is 17
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "The given data was invalid.",
                'errors' => $validator->errors()
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
        $vehicle = $this->vehicleService->create($request);
        return new VehicleResource($vehicle);
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
    public function update(VehiclePostRequest $request, $id)
    {
        $vehicle = $this->vehicleService->update($id, $request);
        
        return Response()->json([
            'data' => new VehicleResource($vehicle)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        if ($this->vehicleService->destroy($id)) {
            return Response()->json([''], 204);
        } else {
            return Response()->json([
                'error' => 'Vehicle not found'
            ], 404);
        }
    }
}

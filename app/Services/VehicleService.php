<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;

class VehicleService
{
    /**
     * Retrieve paginated vehicle models
     * @return LengthAwarePaginator
     */
    
    public function all(string $orderBy = "id", $orderDirection = "ASC"): LengthAwarePaginator
    {
        /** @var items per page */
        $perPage = 20;

        echo request('constructor_id');

        $vehicles = Vehicle::orderBy($orderBy, $orderDirection)
                    ->when(request()->has('model'), function ($q, $value) {
                        $q->where('vehicle_model', 'LIKE', '%' . request('model') . '%');
                    })
                    ->when(request()->has('vin'), function ($q, $value) {
                        $q->where('vin', 'LIKE', request('vin'));
                    })
                    ->when(request()->has('constructor_id'), function ($q, $value) {
                        $q->whereConstructorId(request('constructor_id'));
                    })
                    ->when(request()->has('color'), function ($q, $value) {
                        $q->where('color', 'LIKE', request('color'));
                    })
                    ->paginate($perPage);
        return  $vehicles;                      
    }

    /**
     * Find a vehicle model by its id
     * 
     * @param int $id
     * @return vehicle|False
     */
    public function findById(int $id): ?Vehicle
    {
        return Vehicle::findOrFail($id);
    }
}
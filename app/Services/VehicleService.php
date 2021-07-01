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
    
    public function all($fields = ['*'], $relations = [], string $orderBy = "id", $orderDirection = "ASC"): LengthAwarePaginator
    {
        $perPage = 20;
        $vehicles = Vehicle::orderBy($orderBy, $orderDirection)
                        ->with($relations)
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

    public function format()
    {
        return new VehicleResource();
    }
}
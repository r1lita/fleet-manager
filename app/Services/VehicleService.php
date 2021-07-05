<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleService
{
    /**
     * Retrieve paginated vehicle models. Search parameters maybe provided
     *
     * @param string $orderBy
     * @param string $orderDirection
     * @param int $perPage 
     * @return LengthAwarePaginator
     */
    
    public function all(string $orderBy = "id", string $orderDirection = "ASC", int $perPage = 20): LengthAwarePaginator
    {        
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
     * Find a vehicle by its id
     * 
     * @param int $id
     * @return vehicle|False
     */
    public function findById(int $id): ?Vehicle
    {
        return Vehicle::findOrFail($id);
    }

    /**
     * Create a vehicle
     * 
     * @param Request $request
     * @return Vehicule|False
     */
    public function create(Request $request): ?Vehicle
    {
        return Vehicle::create($request->all());
    }

    public function update(int $id, Request $request): ?Vehicle
    {        
        $vehicle = Vehicle::findOrFail($id);
        
        if ($vehicle->update($request->all())) {
            return $vehicle;
        }
    }

    /**
     * Delete a vehicle by its id
     * 
     * @param int $id
     * @return boolean
     */
    public function destroy(int $id): bool
    {
        if (Vehicle::find($id)) {
            return Vehicle::destroy($id);
        } else {
            return false;
        }
        
    }
}
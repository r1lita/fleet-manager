<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Constructor;

class ConstructorService
{
    /**
     * Retrieve paginated constructor models. Search parameters maybe provided
     * 
     * @param string $orderBy
     * @param string $orderDirection
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    
    public function all(string $orderBy = "id", string $orderDirection = "ASC", int $perPage = 20): LengthAwarePaginator
    {        
        $constructors = Constructor::orderBy($orderBy, $orderDirection)
                    ->when(request()->has('name'), function ($q, $value) {
                        $q->where('name', 'LIKE', '%' . request('model') . '%');
                        $q->orWhere('description', 'LIKE', '%' . request('model') . '%');
                    })
                    ->paginate($perPage);
        
        return  $constructors;                      
    }

    /**
     * Find a constructor by its id
     * 
     * @param int $id
     * @return constructor|False
     */
    public function findById(int $id): ?Constructor
    {
        return Constructor::findOrFail($id);
    }

    /**
     * Create a constructor
     * 
     * @param Request $request
     * @return Vehicule|False
     */
    public function create(Request $request): ?Constructor
    {
        $payload = $request->only('name', 'description', 'logo');
        
        return Constructor::create($payload);
    }

    public function update(int $id, Request $request): ?Constructor
    {        
        $constructor = Constructor::findOrFail($id);
        
        if ($constructor->update($request->all())) {
            return $constructor;
        }
    }

    /**
     * Delete a constructor by its id
     * 
     * @param int $id
     * @return boolean
     */
    public function destroy(int $id): bool
    {        
        if (Constructor::find($id)) {
            return Constructor::destroy($id);
        } else {
            return false;
        }        
    }
}
<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Constructor;
use App\Services\ConstructorService;
use App\Http\Resources\ConstructorResource;
use App\Http\Requests\ConstructorPostRequest;

class ConstructorController extends Controller
{
    public function __construct(ConstructorService $constructorService)
    {   
        $this->constructorService = $constructorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $constructors = $this->constructorService->all();

        return ConstructorResource::collection($constructors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConstructorPostRequest $request)
    {
        $constructor = $this->constructorService->create($request);
        return new ConstructorResource($constructor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $constructor = $this->constructorService->findById($id);
        
        return Response()->json([
            'data' => new ConstructorResource($constructor)
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
        $constructor = $this->constructorService->update($id, $request);
        
        return Response()->json([
            'data' => new ConstructorResource($constructor)
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
        if ($this->constructorService->destroy($id)) {
            return Response()->json([''], 204);
        } else {
            return Response()->json([
                'error' => 'Constructor not found'
            ], 404);
        }
    }
}

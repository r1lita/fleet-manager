<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

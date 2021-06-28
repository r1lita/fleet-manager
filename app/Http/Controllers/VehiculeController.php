<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection; 

use App\Repository\VehiculeRepositoryInterface;

class VehiculeController extends Controller
{
    
    protected $vehiculeRepository;

    public function __construct(VehiculeRepositoryInterface $vehiculeRepository)
    {   
        $this->vehiculeRepository = $vehiculeRepository;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $vehicules = $this->vehiculeRepository->all();

        return $vehicules;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Vehicule::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vehicule::find($id);
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
        // Vehicule::find($id)->update($request->all());
        $vehicule = Vehicule::find($id);
        $vehicule->update($request->all());
        return $vehicule;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Vehicule::destroy($id);
    }
}

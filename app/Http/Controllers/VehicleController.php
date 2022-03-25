<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;
use Exception;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        
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
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $validated = $request->validated();

        try{
            $vehicle = Vehicle::create($validated);

            return response()
                ->json(
                    $data = [
                        "status" => "SUCCESS",
                        "message" => "Successfully added vehicle with $vehicle->registration_no"
                    ], 
                    $status = 201
                );
        }
        catch(Exception $e){
            return response()
                ->json(
                    $data = [
                        "status" => "FAILED",
                        "message" => "Encountered the following error $e->getMessage()"
                    ], 
                    $status = 418
                );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $vehicle = Vehicle::find($id);

            return response()
                ->json(
                    $data = [
                        "status" => "SUCCESS",
                        "message" => "Successfully deleted vehicle with $vehicle->registration_no",
                        "data" => $vehicle
                    ], 
                    $status = 200
                );
        }
        catch(Exception $e){
            return response()
                ->json(
                    $data = [
                        "status" => "FAILED",
                        "message" => "Encountered the following error $e->getMessage()"
                    ], 
                    $status = 418
                );
        }
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
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, $id)
    {
        $validated = $request->validated();

        try{
            $vehicle = Vehicle::find($id)->update($request);

            return response()
                ->json(
                    $data = [
                        "status" => "SUCCESS",
                        "message" => "Successfully updated vehicle with $vehicle->registration_no"
                    ], 
                    $status = 200
                );
        }
        catch(Exception $e){
            return response()
                ->json(
                    $data = [
                        "status" => "FAILED",
                        "message" => "Encountered the following error $e->getMessage()"
                    ], 
                    $status = 418
                );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $vehicle = Vehicle::find($id)->delete();

            return response()
                ->json(
                    $data = [
                        "status" => "SUCCESS",
                        "message" => "Successfully deleted vehicle with $vehicle->registration_no"
                    ], 
                    $status = 200
                );
        }
        catch(Exception $e){
            return response()
                ->json(
                    $data = [
                        "status" => "FAILED",
                        "message" => "Encountered the following error $e->getMessage()"
                    ], 
                    $status = 418
                );
        }
    }
}

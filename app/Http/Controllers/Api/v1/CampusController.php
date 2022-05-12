<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$campus = Campuses::where('states_id',4)->get();
        //return response()->json($campus,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus = $campus->validate([
            //'name' => 
            // 'address'  => 
            // 'phone'  =>  
            // 'email'  => 
            // 'states_id'  => 
            // 'business_id'  => 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}

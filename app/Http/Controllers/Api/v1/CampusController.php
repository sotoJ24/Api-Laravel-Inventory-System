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
        $campus = Campus::where('states_id',4)->get();
        return response()->json($campus,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:100|unique:campuses',
            'address'  => 'required|string|nullable:campuses',
            'phone'  =>  'required|string|max:30|nullable:campuses',
            'email'  => 'required|string|max:100|nullable:campuses',
            'consecutive' => 'required|numeric',
            'states_id'  => 'required|numeric',
            'businesses_id'  => 'required|numeric'
        ]);

        $campus = null;
        if($validation)
        {
            $campus = Campus::create($request->all());
            return response()->json($campus,201);
        }
        return response()->json($campus,417);
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
        $validation = $request->validate([
            'name' => 'required|string|max:100|unique:campuses',
            'address'  => 'required|string|nullable:campuses',
            'phone'  =>  'required|string|max:30|nullable:campuses',
            'email'  => 'required|string|max:100|nullable:campuses',
            'consecutive' => 'required|numeric',
            'states_id'  => 'required|numeric',
            'businesses_id'  => 'required|numeric'
        ]);

         $campus->update($request->all());
         return response()->json($campus,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = Campus::find($id);
        $changeStatus->states_id = $request->states_id;
        $changeStatus->save();
        return response()->json($changeStatus, 200);
    }
}

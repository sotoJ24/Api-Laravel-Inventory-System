<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::where('statuses_id',4)->get();
        return response()->json($business,200);

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
            'name' => 'required|string|max:50|unique:businesses',
            'identifier' => 'required|string|max:20|unique:businesses',
            'statuses_id' => 'required|numeric',
            'super_user_id' => 'required|numeric',
            'phone' => 'required|string|max:25',
            'email' => 'required|string|max:100'

        ]);  


        $business = null;
        if($validation)
        {
            $business = Business::create($request->all());
            return response()->json($business,201);
        }
        return response()->json($business,417);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:50|unique:businesses,name,'.$business->id,
            'identifier' => 'required|string|max:20|unique:businesses,identifier,'.$business->id,
            'statuses_id' => 'required|numeric',
            'super_user_id' => 'required|numeric',
            'phone' => 'required|string|max:25',
            'email' => 'required|string|max:100'

        ]);

         $business->update($request->all());
         return response()->json($business,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = Business::find($id);
        $changeStatus->statuses_id = $request->statuses_id;
        $changeStatus->save();
        return response()->json($changeStatus, 200);

    }
}

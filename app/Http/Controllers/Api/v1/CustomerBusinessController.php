<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\CustomerBusiness;
use Illuminate\Http\Request;

class CustomerBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerBusiness = CustomerBusiness::where('statuses_id',4)->get();
        return response()->json($customerBusiness,200);
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
            'businessesName' => 'required|string',
            'phone' => 'required|string|max:50',
            'email' => 'required|string',
            'contact' => 'required|string',
            'address' => 'required|string',
            'statuses_id' => 'required|numeric'
        ]);

        $customerBusiness = null;
        if($validation)
        {
            $customerBusiness = CustomerBusiness::create($request->all());
            return response()->json($customerBusiness,201);
        }
        return response()->json($customerBusiness,417);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\CustomerBusiness  $customerBusiness
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerBusiness $customerBusiness)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\CustomerBusiness  $customerBusiness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'businessesName' => 'required|string',
            'phone' => 'required|string|max:50',
            'email' => 'required|string',
            'contact' => 'required|string',
            'address' => 'required|string',
            'statuses_id' => 'required|numeric'
        ]);

        if($validation)
        {
            $customerBusiness=CustomerBusiness::findOrFail($id);
            $customerBusiness->businessesName=$request->businessesName;
            $customerBusiness->phone=$request->phone;
            $customerBusiness->email=$request->email;
            $customerBusiness->contact=$request->contact;
            $customerBusiness->address=$request->address;
            $customerBusiness->statuses_id=$request->statuses_id;
            $customerBusiness->save();
            return response()->json($customerBusiness,200);
        }
        // $customerBusiness->update($request->all());
        return response()->json([],406);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\CustomerBusiness  $customerBusiness
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = CustomerBusiness::find($id);
        $changeStatus->statuses_id = $request->statuses_id;
        $changeStatus->save();
        return response()->json($changeStatus, 200);
    }
}

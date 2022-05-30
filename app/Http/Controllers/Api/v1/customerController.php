<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')
            ->join('customer_businesses','customers.customer_businesses','=','customer_businesses.id')
            ->select('customer_businesses.id','customers.limitedCredit','customers.timeCredit', 'customers.identifier','customers.IdType','customers.customer_businesses','customers.statuses_id')
            ->where('customers.statuses_id',4)->orderBy('identifier', 'ASC')
            ->get();
        return response()->json($customers,200);
    }

    public function InactiveCustomers()
    {
        $customers = Customers::where('statuses_id',5)->get();
        return response()->json($customers,200);
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
            'limitedCredit' => 'required|numeric',
            'timeCredit' => 'required|numeric',
            'identifier' => 'required|string|unique:customers',
            'IdType' => 'required|string',
            'customer_businesses' => 'required|numeric',
            'statuses_id' => 'required|numeric',
        ]);

        $customers = null;
        if($validation)
        {
            $customers = Customers::create($request->all());
            return response()->json($customers,201);
        }
        return response()->json($customers,417);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'limitedCredit' => 'required|numeric',
            'timeCredit' => 'required|numeric',
            'identifier' => 'required|string|unique:customers',
            'IdType' => 'required|string',
            'customer_businesses' => 'required|numeric',
            'statuses_id' => 'required|numeric',
        ]);

        if($validation)
        {
            $customers=Customers::findOrFail($id);
            $customers->limitedCredit=$request->limitedCredit;
            $customers->timeCredit=$request->timeCredit;
            $customers->identifier=$request->identifier;
            $customers->IdType=$request->IdType;
            $customers->customer_businesses=$request->customer_businesses;
            $customers->statuses_id=$request->statuses_id;
            $customers->save();
            return response()->json($customers,200);
        }
        // $customerBusiness->update($request->all());
        return response()->json([],406);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = Customers::find($id);
        $changeStatus->statuses_id = $request->statuses_id;
        $changeStatus->save();
        return response()->json($changeStatus, 200);
    }
}

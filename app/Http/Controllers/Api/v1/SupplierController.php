<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supplier = Supplier::query('statuses_id')->get();
        return response()->json($supplier,200);
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
            'companyName' => 'required|string|max:100',
            'phoneNumber' => 'required|string|max:30',
            'email' => 'required|string|unique:suppliers',
            'sellerName' => 'required|string|max:100',
            'sellerPhoneNumber' => 'required|string|max:30',
            'statuses_id' => 'required|numeric'

        ]);

        $supplier = null;
        if($validation)
        {
            $supplier = Supplier::create($request->all());
            return response()->json($supplier,201);
        }
        return response()->json($supplier,417);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validation = $request->validate([
            'companyName' => 'required|string|max:100',
            'phoneNumber' => 'required|string|max:30',
            'email' => 'required|string|unique:suppliers,email,'.$supplier->id,
            'sellerName' => 'required|string|max:100',
            'sellerPhoneNumber' => 'required|string|max:30',
            'statuses_id' => 'required|numeric'
        ]);

        $supplier->update($request->all());
        return response()->json($supplier,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = Supplier::find($id);
        $changeStatus->statuses_id = $request->statuses_id;
        $changeStatus->save();
        return response()->json($changeStatus, 200);
    }
}

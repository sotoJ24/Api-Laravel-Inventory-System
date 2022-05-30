<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\InventoryLostDetail;
use Illuminate\Http\Request;

class InventoryLostDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'headerInventoryLost_id' => 'required|numeric',
                'article_id' => 'required|numeric',
                'salePrice' => 'required|numeric',
                'unitOfMeasure_id' => 'required|numeric',
                'quantity' => 'required|numeric',
                'amount' => 'required|numeric',
                'observation' => 'required|text'
            ]);

        $detail = null;
        if($validation){
            $detail = InventoryLostDetail::create($request->all());
            return response()->json($detail, 201);
        }
        return response()->json($detail,417);
    }

    public function

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\InventoryLostDetail  $inventoryLostDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryLostDetail $inventoryLostDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\InventoryLostDetail  $inventoryLostDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryLostDetail $inventoryLostDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\InventoryLostDetail  $inventoryLostDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryLostDetail $inventoryLostDetail)
    {
        //
    }
}

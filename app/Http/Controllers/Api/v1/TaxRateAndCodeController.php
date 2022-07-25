<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\TaxRateAndCode;
use Illuminate\Http\Request;

class TaxRateAndCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxRate = TaxRateAndCode::all();
        return response()->json($taxRate,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\TaxRateAndCode  $taxRateAndCode
     * @return \Illuminate\Http\Response
     */
    public function show(TaxRateAndCode $taxRateAndCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\TaxRateAndCode  $taxRateAndCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxRateAndCode $taxRateAndCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\TaxRateAndCode  $taxRateAndCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxRateAndCode $taxRateAndCode)
    {
        //
    }
}

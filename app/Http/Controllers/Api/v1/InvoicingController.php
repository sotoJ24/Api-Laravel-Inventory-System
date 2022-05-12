<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Invoicing;
use Illuminate\Http\Request;

class InvoicingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Models\Api\v1\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function show(Invoicing $invoicing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoicing $invoicing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoicing $invoicing)
    {
        //
    }
}

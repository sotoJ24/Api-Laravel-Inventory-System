<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\UnitOfMeasure;
use Illuminate\Http\Request;

class UnitOfMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitOfMeasure = UnitOfMeasure::orderBy('description')->get();
        return response()->json($unitOfMeasure, 200);
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
                    'symbol' => 'required|string',
                    'description' => 'required|string',
                    'unitType' => 'required|string'
        ]);
        $unitOfMeasure = null;
        if($validation)
        {
            $unitOfMeasure = UnitOfMeasure::create($request->all());
            return response()->json($unitOfMeasure,201);
        }
        return response()->json($unitOfMeasure,417);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\UnitOfMeasure  $unitOfMeasure
     * @return \Illuminate\Http\Response
     */
    public function show(UnitOfMeasure $unitOfMeasure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\UnitOfMeasure  $unitOfMeasure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitOfMeasure $unitOfMeasure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\UnitOfMeasure  $unitOfMeasure
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitOfMeasure $unitOfMeasure)
    {
        //
    }
}

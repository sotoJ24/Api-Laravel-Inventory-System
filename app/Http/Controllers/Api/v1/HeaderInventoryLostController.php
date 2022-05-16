<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\HeaderInventoryLost;
use Illuminate\Http\Request;

class HeaderInventoryLostController extends Controller
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
            'date' => 'required',
            'user_id' => 'required|numeric',
            'amount' => 'numeric'
        ]);
        $header = null;
        if($validation){
            $header = HeaderInventoryLost::create($request->all());
            return response()->json($header, 201);
        }
        return response()->json($header,417);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\HeaderInventoryLost  $headerInventoryLost
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderInventoryLost $headerInventoryLost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\HeaderInventoryLost  $headerInventoryLost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeaderInventoryLost $headerInventoryLost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\HeaderInventoryLost  $headerInventoryLost
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeaderInventoryLost $headerInventoryLost)
    {
        //
    }
}

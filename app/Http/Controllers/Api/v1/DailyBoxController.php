<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\DailyBox;
use DateTime;
use Illuminate\Http\Request;

class DailyBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyBox = DailyBox::where('statuses_id',4)->get();
        return response()->json($dailyBox,200);
    }

    public function pending()
    {
        $dailyBox = DailyBox::where('statuses_id',2)->get();
        return response()->json($dailyBox,200);
    }

    public function close()
    {
        $dailyBox = DailyBox::where('statuses_id',6)->get();
        return response()->json($dailyBox,200);
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
            'user_id' => 'required|numeric',
            'openingTime' => 'required|date',
            'campus_id' => 'required|numeric',
            'openingAmount' => 'required|numeric',
            'amountByInscription' => 'required|numeric',
            'amountByMonthy' => 'required|numeric',
            'amountBySell' => 'required|numeric',
            'amountByReservations' => 'required|numeric',
            'amountByCredits' => 'required|numeric',
            'amountBySinpe' => 'required|numeric',
            'amountByTransfer' => 'required|numeric',
            'amountByCash' => 'required|numeric',
            'closingTime' => 'required|date',
            'observations' => 'required|string',
            'statuses_id' => 'required|numeric'
        ]);

        $dailyBox = null;
        if($validation)
        {
            $dailyBox = DailyBox::create($request->all());
            return response()->json($dailyBox,201);
        }
        return response()->json($dailyBox,417);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\DailyBox  $dailyBox
     * @return \Illuminate\Http\Response
     */
    public function show(DailyBox $dailyBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\DailyBox  $dailyBox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyBox $dailyBox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\DailyBox  $dailyBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyBox $dailyBox)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\DailyBox;
use App\Models\Api\v1\Status;
use DateTime;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

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

    public function StatusBox($status)
    {
        $dailyBox = DailyBox::where('statuses_id',$status)->get();
        return response()->json($dailyBox,200);
    }

    public function lookingDate(Request $request)
    {
        $dailyBox = DailyBox::whereBetween('closingDate',[$request->from, $request->until])->get();
        if(empty($dailyBox))
            return response()->json(['message'=>'date not found'],404);
        else
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
            'openingDate' => 'required|date',
            'openingTime' => 'required',
            'campus_id' => 'required|numeric',
            'openingAmount' => 'required|numeric',
            'closingDate' => 'nullable|date',
            'closingTime' => 'nullable',
            'observations' => 'nullable|string',
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
    public function update(Request $request, $id)
    {

        $validation = $request->validate([
            'observations' => 'required|string',
            'statuses_id' => 'required|numeric'
        ]);

        if($validation)
        {
            $dailyBox=DailyBox::findOrFail($id);
            $dailyBox->observations=$request->observations;
            $dailyBox->statuses_id=$request->statuses_id;
            $dailyBox->save();
            return response()->json($dailyBox,200);
        }
        return response()->json([],406);

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

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\HeaderInventoryLost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

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

    public function showLostByDateRange(Request $request)
    {
        $lost = DB::table('header_inventory_losts')
        ->join('roots','header_inventory_losts.user_id','=','roots.id')
        ->select('roots.user','header_inventory_losts.id','header_inventory_losts.date', 'header_inventory_losts.amount')
        ->where('campus_id',$request->campus_id)
        ->whereBetween('date', [$request->from, $request->until])
        ->get();
        if(empty($lost))
            return response()->json(['message'=>'No hay perdidas en ese rango'],404);
        else
            return response()->json($lost,200);
    }
    public function getLastHeader($idCampus){
        $lost = DB::table('header_inventory_losts')
        ->select('header_inventory_losts.status_id','header_inventory_losts.id')
        ->orderBy('created_at','Desc')
        ->where('campus_id',$idCampus)
        ->take(1)
        ->get();
        if(empty($lost))
            return response()->json(['message'=>'No hay encabezados registrados'],404);
        else
            return response()->json($lost,200);

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
            'amount' => 'numeric',
            'campus_id' => 'required|numeric',
            'status_id' => 'required|numeric',
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
    public function updateStatus(Request $request)
    {
        $changeAmount = HeaderInventoryLost::find($request->header_id);
        $changeAmount->status_id = 5;
        $changeAmount->save();
        return response()->json($changeAmount, 200);
    }
    public function destroy(HeaderInventoryLost $headerInventoryLost)
    {
        $headerInventoryLost->delete();
    }
}

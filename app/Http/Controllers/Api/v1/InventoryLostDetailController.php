<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\InventoryLostDetail;
use App\Models\Api\v1\HeaderInventoryLost;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

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
        //return $request->articleLosses[0]['salePrice'];
        $totalAmount = 0;
        $headerId =$request->headerInventoryLost_id;
        $sizeArray = count($request->articleLosses);
        for($index = 0; $index < $sizeArray;$index++)
        {
            // $validation = $request->validate([
            //     $request->articleLosses[$index]['headerInventoryLost_id'] => 'required|numeric',
            //     $request->articleLosses[$index]['article_id'] => 'required|numeric',
            //     $request->articleLosses[$index]['salePrice'] => 'required|numeric',
            //     $request->articleLosses[$index]['quantity'] => 'required|numeric',
            //     $request->articleLosses[$index]['amount'] => 'required|numeric',
            //     $request->articleLosses[$index]['observation'] => 'required|text'
            //  ]);
            // $detail = null;
            // if($validation){

                $detail = new InventoryLostDetail;
                //$detail->headerInventoryLost_id = $request->articleLosses[$index]['headerInventoryLost_id'];
                $detail->headerInventoryLost_id = $headerId;
                $detail->article_id = $request->articleLosses[$index]['article_id'];
                $detail->salePrice = $request->articleLosses[$index]['salePrice'];
                $detail->quantity = $request->articleLosses[$index]['quantity'];
                $detail->amount = $request->articleLosses[$index]['amount'];
                $detail->observation = $request->articleLosses[$index]['observation'];
                $detail->save();
                $decrease = DB::select('CALL updating_inventory_by_lost('.$detail->article_id.','.$detail->quantity.')');
                $totalAmount += $request->articleLosses[$index]['amount'];
            // }
        }
        $updateAmount = HeaderInventoryLost::find($headerId);
        $updateAmount->amount = $totalAmount;
        $updateAmount->save();
        //$detail = null;
        //if($validation){
        //     $detail = InventoryLostDetail::create($request->all());
        return response()->json($detail, 201);
        //}
        //return response()->json($detail,417);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\InventoryLostDetail  $inventoryLostDetail
     * @return \Illuminate\Http\Response
     */
    public function show($headerId)
    {
        $details = DB::table('inventory_lost_details')
            ->join('articles', 'inventory_lost_details.article_id', '=', 'articles.id')
            ->select('articles.name', 'inventory_lost_details.salePrice', 'inventory_lost_details.quantity', 'inventory_lost_details.amount', 'inventory_lost_details.observation')
            ->where('inventory_lost_details.headerInventoryLost_id',$headerId)
            ->get();
        return response()->json($details, 200);
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

    }
}

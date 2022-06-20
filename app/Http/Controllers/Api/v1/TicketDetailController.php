<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Ticket_detail;
use Illuminate\Http\Request;

class TicketDetailController extends Controller
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
        // return$request->articleLosses[0]['salePrice'];
        $sizeArray = count($request->articleDetails);
        for($index=0; $index<$sizeArray; $index++)
        {
        // Svalidation=$request->validate([
        //$request->articleLosses[$index][header InventoryLost_id']=>'required numeric',
        //$request->articleLosses[$index]['article_id']=>'required numeric',
        //$request->articleLosses[$index]['salePrice']=>'required numeric',
        //$request->article Losses[$index]['quantity']=>'required[numeric',
        //$request->articleLosses[$index]['amount']=>'required|numeric',
        //$request->articleLosses[$index]['observation']=>'required text
        //]);
        //$detail=null;
        // if($validation){
                $detail=new Ticket_detail;
                $detail->article_id=$request->articleDetails[$index]['article_id'];
                $detail->quantity= $request->articleDetails[$index]['quantity'];
                $detail->salePrice=$request->articleDetails[$index]['salePrice'];
                $detail->subTotal=$request->articleDetails[$index]['subTotal'];
                $detail->headerTicket_id=$request->articleDetails[$index]['headerTicket_id'];
                $detail->save();
            //}
        }
        //$detail=null;
        // if($validation){
            // sdetail=InventoryLost Detail :: create($request->all());
        return response()->json($detail,201);
        //}
        //return response()->json($detail,417);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Ticket_detail  $ticket_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket_detail $ticket_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Ticket_detail  $ticket_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket_detail $ticket_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Ticket_detail  $ticket_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket_detail $ticket_detail)
    {
        //
    }
}

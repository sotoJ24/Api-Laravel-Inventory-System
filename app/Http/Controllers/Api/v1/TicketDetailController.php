<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Article;
use App\Models\Api\v1\TicketDetail;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;
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
        for ($index = 0; $index < $sizeArray; $index++)
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
            $detail = new TicketDetail;
            $detail->article_id = $request->articleDetails[$index]['article_id'];
            $detail->quantity = $request->articleDetails[$index]['quantity'];
            $detail->salePrice = $request->articleDetails[$index]['salePrice'];
            $detail->subTotal = $request->articleDetails[$index]['subTotal'];
            $detail->headerTicket_id = $request->articleDetails[$index]['headerTicket_id'];
            $detail->statuses_id = $request->articleDetails[$index]['statuses_id'];
            $detail->save();
            $decrease = DB::select('CALL updating_ticket_by_detail('.$detail->article_id.','.$detail->quantity.')');
            //}
        }
        //$detail=null;
        // if($validation){
        // sdetail=InventoryLost Detail :: create($request->all());
        return response()->json($detail, 201);
        //}
        //return response()->json($detail,417);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Ticket_detail  $ticket_detail
     * @return \Illuminate\Http\Response
     */
    public function show($headerId)
    {
        $details = DB::table('ticket_details')
        ->join('articles','ticket_details.article_id', '=', 'articles.id')
            ->select('articles.name', 'ticket_details.quantity', 'ticket_details.salePrice', 'ticket_details.subTotal')
            ->where('ticket_details.headerTicket_id',$headerId)
            ->get();
        return response()->json($details, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Ticket_detail  $ticket_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketDetail $ticket_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Ticket_detail  $ticket_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $changeStatus = TicketDetail::find($id);
        $changeStatus->statuses_id = $request->statuses_id;
        if($changeStatus->save())
        {
            return response()->json("exito", 200);
        }

    }


}

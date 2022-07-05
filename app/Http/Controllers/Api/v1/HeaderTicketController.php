<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Campus;
use App\Models\Api\v1\HeaderTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function searchCampusHeaderTicketByDateRanges(Request $request){
        $headerTicket = DB::table('header_tickets')
              ->join('customers','header_tickets.customers_id','=','customers.id')
              ->join('users','header_tickets.user_id','=','users.id')
              ->join('campuses','header_tickets.campus_id','=','campuses.id')
              ->join('statuses','header_tickets.status_id','=','statuses.id')
              ->join('daily_boxes','header_tickets.dailyBox_id','=','daily_boxes.id')
              ->select('header_tickets.id','header_tickets.consecutive', 'header_tickets.Date', 'header_tickets.NumberDocumentPay', 'customers.identifier as customerIdentifier', 'users.name as userName', 'campuses.name as campusName', 'statuses.name as status','daily_boxes.openingDate as dailyBoxDate','header_tickets.subTotal','header_tickets.IVA', 'header_tickets.IVA', 'header_tickets.Discount','header_tickets.Total')
              ->where('header_tickets.campus_id',$request->campus)
              ->whereBetween('Date',[$request->from, $request->until])
              ->get();
        return response()->json($headerTicket,200);
    }


    public function showAllHeaderByStatus($status)
    {
        $headerTicket = HeaderTicket::where('status_id',$status)->get();
        return response()->json($headerTicket,200);
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
            'consecutive' => 'required|numeric',
            'Date' => 'required|date',
            'NumberDocumentPay' => 'required|numeric',
            'customers_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'status_id' => 'required|numeric',
            'dailyBox_id' => 'required|numeric',
            'subTotal' => 'required|numeric',
            'IVA' => 'required|numeric',
            'Discount' => 'required|numeric',
            'Total' => 'required|numeric'
        ]);

        $headerTicket = null;
        if($validation)
        {
            $headerTicket = HeaderTicket::create($request->all());
            return response()->json($headerTicket,201);
        }
        return response()->json($headerTicket,417);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Header_ticket  $header_ticket
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderTicket $header_ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api\v1\Header_ticket  $header_ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'status_id' => 'required|numeric'
        ]);

        if($validation)
        {
            $headerTicket=HeaderTicket::findOrFail($id);
            $headerTicket->status_id=$request->status_id;
            $headerTicket->save();
            return response()->json($headerTicket,200);
        }
        return response()->json([],406);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Header_ticket  $header_ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

    }
}

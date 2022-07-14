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


    public function searchCampusHeaderTicketByDateRanges(Request $request, $status){

            $headerTicket = DB::table('header_tickets')
                ->join('customers','header_tickets.customers_id','=','customers.id')
                ->join('users','header_tickets.user_id','=','users.id')
                ->join('campuses','header_tickets.campus_id','=','campuses.id')
                ->join('statuses','header_tickets.status_id','=','statuses.id')
                ->join('daily_boxes','header_tickets.dailyBox_id','=','daily_boxes.id')
                ->select('header_tickets.id','header_tickets.consecutive', 'header_tickets.date', 'customers.identifier as customerIdentifier', 'users.name as userName', 'campuses.name as campusName', 'statuses.name as status','daily_boxes.openingDate as dailyBoxDate','header_tickets.subTotal', 'header_tickets.iva', 'header_tickets.discount','header_tickets.total')
                ->where('header_tickets.campus_id',$request->campus)
                ->whereBetween('date',[$request->from, $request->until])
                ->get();
                if($status == 0)
                {
                  return response()->json($headerTicket,200);
                }
                else{
                    $headerTicket = DB::table('header_tickets')
                    ->join('customers','header_tickets.customers_id','=','customers.id')
                    ->join('users','header_tickets.user_id','=','users.id')
                    ->join('campuses','header_tickets.campus_id','=','campuses.id')
                    ->join('statuses','header_tickets.status_id','=','statuses.id')
                    ->join('daily_boxes','header_tickets.dailyBox_id','=','daily_boxes.id')
                    ->select('header_tickets.id','header_tickets.consecutive', 'header_tickets.date', 'customers.identifier as customerIdentifier', 'users.name as userName', 'campuses.name as campusName', 'statuses.name as status','daily_boxes.openingDate as dailyBoxDate','header_tickets.subTotal', 'header_tickets.iva', 'header_tickets.discount','header_tickets.total')
                    ->where('header_tickets.campus_id',$request->campus)
                    ->where('status_id',$status)
                    ->whereBetween('date',[$request->from, $request->until])
                    ->get();
                    return response()->json($headerTicket,200);
               }
    }


    public function showByStatus($status)
    {
        $customers = HeaderTicket::where('statuses_id',$status)->get();
        return response()->json($customers,200);
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
            'date' => 'required|date',
            'customers_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'status_id' => 'required|numeric',
            'dailyBox_id' => 'required|numeric',
            'subTotal' => 'required|numeric',
            'iva' => 'required|numeric',
            'discount' => 'required|numeric',
            'total' => 'required|numeric'
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
            'subTotal' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        if($validation)
        {
            $headerTicket=HeaderTicket::findOrFail($id);
            $headerTicket->subTotal=$request->subTotal;
            $headerTicket->total=$request->total;
            $headerTicket->save();
            return response()->json($headerTicket,200);
        }
        return response()->json([],406);

    }

    public function changeStatus(Request $request, $id)
    {
        if($request['status_id'] == 5)
        {
            $validation = $request->validate([
                'status_id' => 'required|numeric'
            ]);

        }else{
            return response()->json(['message'=>'The status only can be change in status 5'],404);;
        }

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

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Header_ticket;
use Illuminate\Http\Request;

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

    public function StatusHeader($status)
    {
        $headerticket = Header_ticket::where('user_id',$status)->get();
        return response()->json($headerticket,200);
    }

    public function lookingDate(Request $request)
    {
        $headerticket = Header_ticket::whereBetween('Date', [$request->from])->get();
        if (empty($headerticket))
            return response()->json(['message' => 'date not found'], 404);
        else
            return response()->json($headerticket, 200);
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

        $headerticket = null;
        if($validation)
        {
            $headerticket = Header_ticket::create($request->all());
            return response()->json($headerticket,201);
        }
        return response()->json($headerticket,417);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api\v1\Header_ticket  $header_ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Header_ticket $header_ticket)
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
    public function update(Request $request, Header_ticket $header_ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api\v1\Header_ticket  $header_ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header_ticket $header_ticket)
    {
        //
    }
}

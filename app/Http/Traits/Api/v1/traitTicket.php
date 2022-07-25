<?php

namespace App\Http\Traits\Api\v1;
use App\Models\Api\v1\HeaderTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait traitTicket{

    protected $count = 1;
    public function increaseConsecutiveCampus($headerDetails,$counta)
    {

       $consecutive = DB::table('campuses')
        ->select('consecutive')
        ->where('id',$headerDetails[0]['campus_id'])->first();
        $next = (integer)$consecutive->consecutive + 1;
        // $selectConsecutive = DB::table('campuses')->where('id',$campusId)->select('consecutive')->get();
        DB::table('campuses')->where('id', $headerDetails[0]['campus_id'])->update(['consecutive' => $next]);
        // return response()->json(['The increase consecutive is'=>$next],201);
        $this->count = (integer)$this->count+$counta;
        $this->increaseConsecutiveHeaderTicketTrait($next,$headerDetails,$counta);
        return $this->count;

    }

    public function increaseConsecutiveHeaderTicketTrait($next,$headerDetails,$counta)
    {
        $consecutiveHeader = HeaderTicket::findOrFail($headerDetails[0]['headerTicket_id']);
        $consecutiveHeader->consecutive = $next;
        $consecutiveHeader->save();
        $this->count = (integer)$this->count+$counta;
        $this->updateHeaderTicket($headerDetails,$counta);
        return $this->count;

    }

    public function updateHeaderTicket($headerDetails,$counta)
    {
        // $validation = $reques->validate([
        //     'subTotal' => 'required|numeric',
        //     'total' => 'required|numeric',
        //     'iva' => 'numeric',
        //     'discount' => 'numeric'
        // ]);

        // if($validation)
        // {
            $headerTicket=HeaderTicket::findOrFail($headerDetails[0]['headerTicket_id']);
            $headerTicket->subTotal=$headerDetails[0]['subTotal'];
            $headerTicket->total=$headerDetails[0]['total'];
            $headerTicket->iva=$headerDetails[0]['iva'];
            $headerTicket->discount=$headerDetails[0]['discount'];
            $headerTicket->save();
            $this->count = (integer)$this->count+$counta;
            return $this->count;



        // }
        // return response()->json([],406);
    }

}

<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\PaymentsMethods;
use App\Models\Api\v1\HeaderTicket;

class HeaderTicketPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'paymentsMethods_id',
        'headerticket_id',
        'numberDocumentPay',
        'amount'
    ];

    public function PaymentHeader()
    {
        return $this->belongsTo(PaymentsMethods::class);
    }

    public function HeaderTicketPayment()
    {
        return $this->belongsTo(HeaderTicket::class);
    }

}

<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\PaymentsMethods;

class Header_ticket_payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'paymentsMethods_id',
        'headerticket_id',
        'amount'
    ];

    public function PaymentHeader()
    {
        return $this->belongsTo(PaymentsMethods::class);
    }

    

}

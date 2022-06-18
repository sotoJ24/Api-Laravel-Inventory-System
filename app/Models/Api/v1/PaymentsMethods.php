<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Header_ticket_payment;
class PaymentsMethods extends Model
{
    use HasFactory;
    protected $fillable = [
                       'name'
    ];

    public function PaymentHeader()
    {
        return $this->hasMany(Header_ticket_payment::class);
    }

}

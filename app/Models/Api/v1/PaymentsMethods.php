<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\HeaderTicketPayment;
class PaymentsMethods extends Model
{
    use HasFactory;
    protected $fillable = [
                       'name'
    ];

    public function PaymentHeader()
    {
        return $this->hasMany(HeaderTicketPayment::class);
    }

}

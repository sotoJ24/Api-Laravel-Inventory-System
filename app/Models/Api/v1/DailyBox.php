<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyBox extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
                           'dateTime',
                           'campus_id',
                           'openingAmount',
                           'amountByInscription',
                           'amountByMonthy',
                           'amountBySell',
                           'amountByReservations',
                           'amountByCredits',
                           'amountBySinpe',
                           'amountByTransfer',
                           'amountByCash',
                           'closingTime'
    ];

}

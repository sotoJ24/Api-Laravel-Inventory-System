<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Api\v1\Campus;
use App\Models\Api\v1\Status;

class DailyBox extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', //FK
                           'openingTime', //date
                           'campus_id', //FK
                           'openingAmount',//required double
                           'amountByInscription', //double
                           'amountByMonthy', //double
                           'amountBySell', //double
                           'amountByReservations', //double
                           'amountByCredits', //double
                           'amountBySinpe', //double
                           'amountByTransfer',//double
                           'amountByCash',//double
                           'closingTime', //date
                           'observations', //text
                           'statuses_id',//FK
    ];

    public function userBoxes()
    {
         return $this->hasmany(User::class);
    }

    public function campusBox()
    {
         return $this->hasmany(Campus::class);
    }

    public function statusBox()
    {
         return $this->belongsTo(Status::class);
    }
}

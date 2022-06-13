<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Api\v1\Campus;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\Header_ticket;
use App\Models\Api\v1\DailyBoxCampusAmountControlBoxes;

class DailyBox extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', //FK
                           'openingDate', //date
                           'openingTime',
                           'campus_id',//FK
                           'openingAmount',
                           'closingDate',
                           'closingTime',
                           'observations',
                           'statuses_id'//FK

    ];

    public function userBoxes()
    {
         return $this->hasmany(User::class);
    }

    public function DailyBoxesControlAmount()
    {
         return $this->hasmany(DailyBoxCampusAmountControlBoxes::class);
    }

    public function campusBox()
    {
         return $this->belongsTo(Campus::class);
    }

    public function statusBox()
    {
         return $this->belongsTo(Status::class);
    }

    public function HeaderTickets()
    {
         return $this->hasMany(Header_ticket::class);
    }
}

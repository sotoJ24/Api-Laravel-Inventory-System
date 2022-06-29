<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\Business;
use App\Models\Api\v1\DailyBox;
use App\Models\Api\v1\HeaderTicket;
use App\Models\Api\v1\Article;
use App\Models\User;
use App\Models\Api\v1\CampusAmountControlBoxes;

class Campus extends Model
{
    use HasFactory;
    protected $fillable = ['name', //string
                            'address',  //string
                            'phone', //string
                            'email' ,//string
                            'consecutive',//bigInteger
                            'states_id',//foreign-key
                            'businesses_id'//foreign-key
    ];

    public function statusCampus()
    {
        return $this->belongsTo(Status::class);
    }

    public function campusBusiness()
    {
        return $this->belongsTo(Business::class);
    }

    public function campusBox()
    {
        return $this->hasMany(DailyBox::class);
    }

    public function campusUser()
    {
        return $this->hasMany(User::class);
    }

    public function CampusTicketsHeader()
    {
        return $this->hasMany(HeaderTicket::class);
    }

    public function campusAmountControlBoxes()
    {
        return $this->hasMany(CampusAmountControlBoxes::class);
    }

    public function campusArticles()
    {
        return $this->hasMany(Article::class);
    }

}

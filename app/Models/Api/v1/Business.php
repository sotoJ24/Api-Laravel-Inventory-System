<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\Campus;

class Business extends Model
{
    use HasFactory;
    protected $fillable = ['name', //string 
                           'identifier', //string
                           'super_user_id', //foreing
                           'statuses_id', //foreing
                           'phone', //string
                           'email' //string
    ];

    public function statusBusiness()
    {
        return $this->belongsTo(Status::class);
    }

    public function campusBusiness()
    {
        return $this->hasmany(Campus::class);
    }
}

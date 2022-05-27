<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\Business;
use App\Models\Api\v1\HeaderInventoryLost;

class Campus extends Model
{
    use HasFactory;
    protected $fillable = ['name', //string
                            'address',  //string
                            'phone', //string
                            'email' ,//string
                            'states_id',//foreign-key
                            'businesses_id'//foreign-key
    ];

    public function statusCampus()
    {
        return $this->belongsTo(Status::class);
    }

    public function statusBusiness()
    {
        return $this->belongsTo(Business::class);
    }

    public function campus()
    {
        return $this->hasMany(HeaderInventoryLost::class);
    }

}

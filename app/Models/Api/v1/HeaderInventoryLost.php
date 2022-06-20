<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;
use App\Models\User;
use App\Models\Api\v1\InventoryLostDetail;
use App\Models\Api\v1\Campus;

class HeaderInventoryLost extends Model
{
    use HasFactory;
    protected $fillable = ['date', //date
                           'user_id', //foreing
                           'campus_id',
                           'status_id',//foreing
                           'amount' //double
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventoryLostDetail()
    {
        return $this->hasMany(InventoryLostDetail::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
}


<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Api\v1\InventoryLostDetail;

class HeaderInventoryLost extends Model
{
    use HasFactory;
    protected $fillable = ['date', //date
                           'user_id', //foreing
                           'amount' //double
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventoryLostDetail()
    {
        return $this->hasMany(InventoryLostDetail::class);
    }
}


<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['companyName', //string
                           'phoneNumber',  //string
                           'email', //string
                           'sellerName', //string
                           'sellerPhoneNumber', //string
                           'statuses_id' //enum
    ];


    public function statusSupplier()
    {
        return $this->belongsTo(Status::class);
    }
}

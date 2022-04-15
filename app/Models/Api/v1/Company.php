<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['companyName', //string
                            'numberId',  //string
                            'states'    //enum
    ];
    const Enable = 1;
    const Disable = 0;

    function campus(){
        return $this->hasMany(Campus::class);
    }
}

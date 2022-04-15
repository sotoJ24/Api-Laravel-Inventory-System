<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $fillable = ['name', //string
                            'address',  //string
                            'phone', //string
                            'email', //string
                            'states',    //enum
                            'company_id' //foreing key
    ];
    const Enable = 1;
    const Disable = 0;

    function company(){
        return $this->belongsTo(Company::class);
    }

}

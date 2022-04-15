<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', //string
                           'phone',  //string
                           'email', //string
                           'contact', //string
                           'mobile', //string
                           'state' //enum
    ];
    const Enable = 1;
    const Disable = 0;
    public function articleSupplier(){
        return $this->hasMany(Article_Supplier::class);
    }
}

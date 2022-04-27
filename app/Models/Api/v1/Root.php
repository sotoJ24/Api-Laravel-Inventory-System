<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Root extends Model
{
    use HasFactory;
    protected $fillable = [ 'user', //String
                            'password', //String
                            'email', //String
                            'status_id'

    ];
}

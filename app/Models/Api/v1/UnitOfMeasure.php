<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitOfMeasure extends Model
{
    use HasFactory;
    protected $fillable = ['symbol',
    'description',
    'unitType'
    ];

    //One-to-many relationship
    public function articles(){
    return $this->hasMany(Article::class);
    }
}

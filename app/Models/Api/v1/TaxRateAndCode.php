<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxRateAndCode extends Model
{
    use HasFactory;
    protected $fillable = ['ivaCode',
                           'ivaRate',
                           'percentage'
    ];
    public function articles(){
        return $this->hasMany(Article::class);
    }
}

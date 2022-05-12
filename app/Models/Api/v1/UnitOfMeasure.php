<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Article;
use App\Models\Api\v1\InventoryLostDetail;

class UnitOfMeasure extends Model
{
    use HasFactory;
    protected $fillable = ['symbol',
    'description',
    'unitType'
    ];

    public function articles(){
    return $this->hasMany(Article::class);
    }

    public function inventoryLostDetail(){
        return $this->hasMany(InventoryLostDetail::class);
        }
}

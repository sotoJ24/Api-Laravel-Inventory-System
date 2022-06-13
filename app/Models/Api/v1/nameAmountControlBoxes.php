<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\CampusAmountControlBoxes;

class nameAmountControlBoxes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function NamesOfCampusAmount()
    {
        return $this->hasMany(CampusAmountControlBoxes::class);
    }
}

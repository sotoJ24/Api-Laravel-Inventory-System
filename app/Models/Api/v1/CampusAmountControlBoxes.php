<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\NameAmountControlBoxes;
use App\Models\Api\v1\Campus;

class CampusAmountControlBoxes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameAmountControlBoxes_id',
        'campus_id',
    ];

    public function BoxesCampusAmount()
    {
        return $this->belongsTo(NameAmountControlBoxes::class);
    }

    public function BoxesCampus()
    {
        return $this->belongsTo(Campus::class);
    }
}

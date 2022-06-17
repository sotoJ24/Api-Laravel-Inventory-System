<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\DailyBox;

class DailyBoxCampusAmountControlBoxes extends Model
{
    use HasFactory;
    protected $fillable = [
                        'Dailybox_id',
                        'CampusAmountControlBoxes_id',
                        'amount',
    ];

    public function DailyBoxesControlAmount()
    {
        return $this->belongsTo(DailyBox::class);
    }

    public function BoxesCampusAmount()
    {
        return $this->belongsTo(CampusAmountControlBoxes::class);
    }


}

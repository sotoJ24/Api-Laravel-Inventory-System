<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;

class CustomerBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
                        'businessesName',
                        'phone',
                        'email',
                        'contact',
                        'address',
                        'statuses_id'
    ];

    public function customerStatus()
    {
        return $this->belongsTo(Status::class);
    }

}

<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Status;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
                        'limitedCredit',
                        'timeCredit',
                        'identifier',
                        'IdType',
                        'customer_businesses',
                        'statuses_id'
    ];

    public function statusCustomers()
    {
        return $this->belongsTo(Status::class);
    }
}

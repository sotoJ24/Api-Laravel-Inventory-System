<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Business;
use App\Models\Api\v1\Campus;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function statusBusiness()
    {
         return $this->hasmany(Business::class);
    }

    public function statusCampus()
    {
         return $this->hasmany(Campus::class);
    }
}




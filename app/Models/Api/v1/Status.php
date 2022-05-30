<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Business;
use App\Models\Api\v1\Campus;
use App\Models\Api\v1\CustomerBusiness;
use App\Models\Api\v1\Supplier;
use App\Models\Api\v1\Customers;
use App\Models\User;


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

    public function statusCustomerBusinesses()
    {
         return $this->hasmany(CustomerBusiness::class);
    }

    public function statusSupplier()
    {
         return $this->hasmany(Supplier::class);
    }

    public function statusCustomer()
    {
         return $this->hasmany(Customers::class);
    }

    public function statusUser()
    {
         return $this->hasmany(User::class);
    }

}




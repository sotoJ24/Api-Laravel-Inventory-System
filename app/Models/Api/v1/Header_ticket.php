<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Customers;
use App\Models\Api\v1\Ticket_detail;
use App\Models\Api\v1\DailyBox;
use App\Models\Api\v1\Campus;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\Header_ticket_payment;
use App\Models\User;

class Header_ticket extends Model
{
    use HasFactory;
    protected $fillable = [
                'consecutive',
                'Date',
                'transactionNumber',
                'customers_id', //FK
                'user_id', //FK
                'campus_id',//FK
                'status_id',//FK
                'dailyBox_id',
                'subTotal',
                'IVA',
                'Discount',
                'Total'
    ];

    public function CustomerHeader()
    {
        return $this->belongsTo(Customers::class);
    }

    public function HeaderpaymentTicket()
    {
        return $this->hasMany(Header_ticket_payment::class);
    }

    public function HeaderBox()
    {
        return $this->belongsTo(DailyBox::class);
    }

    public function HeaderDetail_ticket()
    {
        return $this->hasMany(Ticket_detail::class);
    }

    public function UserHeaderTicket()
    {
        return $this->belongsTo(User::class);
    }

    public function HeaderCampuses()
    {
        return $this->belongsTo(Campus::class);
    }

    public function statusHeader()
    {
         return $this->belongsTo(Status::class);
    }

}

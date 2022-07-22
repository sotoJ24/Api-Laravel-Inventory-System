<?php

namespace App\Models\Api\v1;

use App\Http\Traits\Api\v1\traitTicket;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Customers;
use App\Models\Api\v1\TicketDetail;
use App\Models\Api\v1\DailyBox;
use App\Models\Api\v1\Campus;
use App\Models\Api\v1\Status;
use App\Models\Api\v1\HeaderTicketPayment;
use App\Models\User;

class HeaderTicket extends Model
{
    use HasFactory,traitTicket;
    protected $fillable = [
                'consecutive',
                'date',
                'customers_id', //FK
                'user_id', //FK
                'campus_id',//FK
                'status_id',//FK
                'dailyBox_id',
                'subTotal',
                'iva',
                'discount',
                'total'
    ];

    public function CustomerHeader()
    {
        return $this->belongsTo(Customers::class);
    }

    public function HeaderpaymentTicket()
    {
        return $this->hasMany(HeaderTicketPayment::class);
    }

    public function HeaderBox()
    {
        return $this->belongsTo(DailyBox::class);
    }

    public function HeaderDetail_ticket()
    {
        return $this->hasMany(TicketDetail::class);
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

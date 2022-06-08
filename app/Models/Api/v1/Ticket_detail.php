<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Header_ticket;

class Ticket_detail extends Model
{
    use HasFactory;
    protected $fillable = [
                        'article_id',
                        'amount',
                        'salePrice',
                        'subTotal',
                        'headerTicket_id',
    ];

    public function HeaderDetail_ticket()
    {
        return $this->belongsTo(Header_ticket::class);
    }



}

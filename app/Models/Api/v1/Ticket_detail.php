<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Header_ticket;
use App\Models\Api\v1\Article;

class Ticket_detail extends Model
{
    use HasFactory;
    protected $fillable = [
                        'article_id',
                        'quantity',
                        'salePrice',
                        'subTotal',
                        'headerTicket_id',
    ];

    public function HeaderDetail_ticket()
    {
        return $this->belongsTo(Header_ticket::class);
    }

    public function TicketArticle()
    {
        return $this->hasMany(Article::class);
    }



}

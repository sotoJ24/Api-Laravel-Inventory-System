<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\HeaderTicket;
use App\Models\Api\v1\Article;
use App\Models\Api\v1\Status;

class TicketDetail extends Model
{
    use HasFactory;
    protected $fillable = [
                        'article_id',
                        'quantity',
                        'salePrice',
                        'subTotal',
                        'headerTicket_id',
                        'statuses_id'
    ];

    public function HeaderDetail_ticket()
    {
        return $this->belongsTo(HeaderTicket::class);
    }

    public function TicketDetailStatus()
    {
        return $this->belongsTo(Status::class);
    }

    public function TicketArticle()
    {
        return $this->hasMany(Article::class);
    }



}

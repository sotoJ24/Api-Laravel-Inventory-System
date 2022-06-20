<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\HeaderInventoryLost;
use App\Models\Api\v1\Article;
Use App\Models\Api\v1\UnitOfMeasure;

class InventoryLostDetail extends Model
{
    use HasFactory;
    protected $fillable =['headerInventoryLost_id',
                          'article_id',
                          'salePrice',
                          'unitOfMeasure_id',
                          'quantity',
                          'amount',
                          'observation',
                          'date'

    ];
    public function headerInventoryLost()
    {
        return $this->belongsTo(HeaderInventoryLost::class);
    }

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }
}

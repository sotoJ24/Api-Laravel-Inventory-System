<?php

namespace App\Models\Api\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Article;
// use App\Models\Api\v1\Supplier;

class Article_Supplier extends Model
{
    use HasFactory;
    protected $fillable = [//'supplier_id', //Foreing
                            'article_id'  //Foreing

    ];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class);
    // }
}

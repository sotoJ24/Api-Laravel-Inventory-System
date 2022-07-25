<?php

namespace App\Models\Api\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\ArticleSupplier;
use App\Models\Api\v1\UnitOfMeasure;
use App\Models\Api\v1\InventoryLosse;
use App\Models\Api\v1\TicketDetail;
use App\Models\Api\v1\Campus;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['barcode',              //String
                           'unitOfMeasure_id',
                           'campuses_id',    // foreing key
                           'name',               //string
                           'purchasePrice',     //double
                           'salePrice',        // precio
                           'states',          // enum
                           'stock',          //double
                           'minimumStock',  //double
                           'taxRate_id'    //Foreing_key
    ];
    const Enable = 1;
    const Disable = 0;

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    public function articleCampus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function articleSupplier(){
        return $this->hasMany(ArticleSupplier::class);
    }

    public function inventoryLostDetail(){
        return $this->hasMany(InventoryLostDetail::class);
    }

    public function ticketDetail(){
        return $this->belongsTo(TicketDetail::class);
    }

    public function taxRadeAndCodes(){
        return $this->belongsTo(TaxRateAndCode::class);
    }
}

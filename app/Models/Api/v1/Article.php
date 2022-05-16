<?php

namespace App\Models\Api\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Article_Supplier;
use App\Models\Api\v1\UnitOfMeasure;
use App\Models\Api\v1\InventoryLosse;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['barcode',              //String
                           'unitOfMeasure_id',    // foreing key
                           'name',               //string
                           'purchasePrice',     //double
                           'salePrice',        // precio
                           'states',          // enum
                           'stock',          //double
                           'minimumStock',  //double
                           'supplier_id'   // foreing key
    ];
    const Enable = 1;
    const Disable = 0;

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitOfMeasure::class);
    }

    public function articleSupplier(){
        return $this->hasMany(Article_Supplier::class);
    }

    public function inventoryLostDetail(){
        return $this->hasMany(InventoryLostDetail::class);
    }
}

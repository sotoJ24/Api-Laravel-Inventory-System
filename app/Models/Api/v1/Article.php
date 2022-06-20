<?php

namespace App\Models\Api\v1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Api\v1\Article_Supplier;
use App\Models\Api\v1\UnitOfMeasure;
use App\Models\Api\v1\InventoryLosse;
use App\Models\Api\v1\Ticket_detail;
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
        return $this->hasMany(Article_Supplier::class);
    }

    public function inventoryLostDetail(){
        return $this->hasMany(InventoryLostDetail::class);
    }

    public function ticketDetail(){
        return $this->belongsTo(Ticket_detail::class);
    }
}

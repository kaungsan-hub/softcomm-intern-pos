<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Supplier, PurchaseDetail, Item};

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_date','supplier_id','total_amount','created_by','update_by'];

    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetail::class, 'purchase_id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    // public function item(){
    //     return $this->belongsTo(Item::class, 'item_id');
    // }
}

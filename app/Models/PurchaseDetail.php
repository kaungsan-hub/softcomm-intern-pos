<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_id','item_id','quantity','purchase_price','amount'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\{Category, ItemLocation, Brand, User};

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['item_code','name','brand_id','category_id','item_location_id','warranty','imei_status','reorder_qty','remark','created_by'];

    public function brands(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function itemLocation(){
        return $this->belongsTo(ItemLocation::class, 'item_location_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'created_by');
    }
}

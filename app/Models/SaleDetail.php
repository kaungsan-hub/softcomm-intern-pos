<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'item_id', 'item_code', 'quantity', 'amount'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
}

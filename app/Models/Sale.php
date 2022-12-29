<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['sale_date', 'customer_id', 'total_amount', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class, 'sale_id');
    }
}

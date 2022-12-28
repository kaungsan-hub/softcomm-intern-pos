<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseDetail;
use App\Models\{Supplier};

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_date','supplier_id','total_amount','created_by','update_by'];

}

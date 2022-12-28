<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningDetail extends Model
{
    use HasFactory;
    protected $fillable =['opening_id','quantity','item_id'];
    
}

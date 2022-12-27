<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemLocation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','description','created_by','deleted_at'];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}

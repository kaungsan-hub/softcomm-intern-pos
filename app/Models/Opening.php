<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;

    protected $fillable = ['created_by','remark'];

    public function items(){
        return $this->hasMany(Item::class, 'item_id');
    }

    public function openingDetails(){
        return $this->hasMany(OpeningDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

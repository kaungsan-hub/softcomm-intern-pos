<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SetPrice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['item_code','r1','r2','created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'item_id');
    }
}
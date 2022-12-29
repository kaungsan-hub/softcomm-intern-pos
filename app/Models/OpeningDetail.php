<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningDetail extends Model
{
    use HasFactory;
    protected $fillable =['opening_id','quantity','item_id'];

    public function opening(){
        return $this->belongsTo(Opening::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}

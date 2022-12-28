<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Counter extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','created_by'];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}

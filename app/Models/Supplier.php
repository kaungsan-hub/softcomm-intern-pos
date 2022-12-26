<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{



    use HasFactory;
    protected $fillable = ['name','address','phone','contact_person','created_by'];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class,'category_id');
    // }

}

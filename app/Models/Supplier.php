<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supplier extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','address','phone','contact_person','created_by'];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class,'category_id');
    // }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Models\User;


class Customer extends Model
{
    use HasFactory;
    Protected $fillable=['name','contact_person','phone','address','email','region','city','remark','city','remark','created_by','deleted_at'];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
}

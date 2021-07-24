<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jalan extends Model
{
    protected $table = 'jalan';
    protected $fillable =['id','nama_jalan','coordinat','created_at','updated_at','deleted_at'];
}

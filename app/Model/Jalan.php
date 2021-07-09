<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jalan extends Model
{
    use SoftDeletes;
    protected $table = 'jalan';
    protected $fillable =['id','nama_jalan','coordinat','created_at','updated_at','deleted_at'];
}

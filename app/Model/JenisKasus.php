<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKasus extends Model
{
    use SoftDeletes;
    protected $table = 'jenis_kasus';
    protected $fillable =['id','j_kasus','created_at','updated_at','deleted_at'];
}

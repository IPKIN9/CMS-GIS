<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KondisiKorban extends Model
{
    protected $table = 'KondisiKorban';
    protected $fillable =['id','kon_kasus','ket','created_at','updated_at','deleted_at'];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KondisiKorban extends Model
{
    use SoftDeletes;
    protected $table = 'kondisi_korban';
    protected $fillable =['id','kon_kasus','ket','created_at','updated_at','deleted_at'];
}

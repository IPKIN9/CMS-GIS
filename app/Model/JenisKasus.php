<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisKasus extends Model
{
    protected $table = 'jenis_kasus';
    protected $allowedFields =['id','j_kasus','created_at','updated_at','deleted_at'];
}
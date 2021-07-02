<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisKasus extends Model
{
    protected $table = 'jenis_kasus';
    protected $allowedFields =['j_kasus'];
}

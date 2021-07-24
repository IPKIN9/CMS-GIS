<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisKasus extends Model
{
    protected $table = 'jenis_kasus';
    protected $fillable = [
        'id', 'j_kasus',
        'marker_icon',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

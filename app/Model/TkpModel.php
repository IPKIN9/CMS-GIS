<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TkpModel extends Model
{
    protected $table = 'tkp';
    protected $fillable = [
        'id','kelurahan','koordinat','created_at','updated_at'
    ];
}
<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebDesc extends Model
{
    protected $table = '_web_description';
    protected $fillable =[
        'id','web_description',
        'created_at',
        'updated_at'
    ];
}

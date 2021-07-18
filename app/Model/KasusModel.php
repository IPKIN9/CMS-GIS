<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KasusModel extends Model
{
    protected $table = 'kasus';
    protected $fillable = [
        'id', 'kasus_id', 'jalan_id',
        'jumlah_korban', 'kon_id', 'user_id',
        'ket', 'created_at', 'updated_at'
    ];
    public function kasus_rol()
    {
        return $this->belongsTo(JenisKasus::class, 'kasus_id');
    }
    public function jalan_rol()
    {
        return $this->belongsTo(Jalan::class, 'jalan_id');
    }
    public function kon_rol()
    {
        return $this->belongsTo(KondisiKorban::class, 'kon_id');
    }
    public function user_rol()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

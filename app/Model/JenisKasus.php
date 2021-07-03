<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisKasus extends Model
{
    protected $table = 'jenis_kasus';
    protected $allowedFields =['j_kasus'];
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
}

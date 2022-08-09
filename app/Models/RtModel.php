<?php

namespace App\Models;

use CodeIgniter\Model;

class RtModel extends Model
{
    protected $table            = 'rt';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_rt', 'no_rt', 'created_at', 'updated_at', 'deleted_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

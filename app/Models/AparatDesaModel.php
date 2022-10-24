<?php

namespace App\Models;

use CodeIgniter\Model;

class AparatDesaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aparat_desa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 1;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'jabatan_id', 'pendidikan_terakhir', 'tgl_pengangkatan', 'no_sk', 'no_hp', 'foto'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function withJabatan()
    {
        $this->select('jabatan.name as nama_jabatan, aparat_desa.*');
        
        return $this->join('jabatan', 'jabatan.id = aparat_desa.jabatan_id')->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaPendudukModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'anggota_penduduk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 1;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kk_id', 'penduduk_id', 'role_id', 'status_hubungan'];

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

    public function getUser(String $nik)
    {
        return $this->select('kartu_keluarga.no_kk, penduduk.*, anggota_penduduk.*')
                    ->join('kartu_keluarga', 'kartu_keluarga.id = anggota_penduduk.kk_id')
                    ->join('penduduk', 'penduduk.id = anggota_penduduk.penduduk_id')
                    ->where('nik', $nik)->first();
    }
}

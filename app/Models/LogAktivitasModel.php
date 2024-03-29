<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAktivitasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'log_activity';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 1;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'activities', 'created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
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

    public function withUser()
    {
        $this->select('users.name, users.status, log_activity.*');
        
        return $this->join('users', 'users.id = log_activity.user_id')->orderBy('id','DESC')->findAll();
    }

    public function withLimit()
    {
        return $this->select('users.name, users.status, log_activity.*')
                    ->join('users', 'users.id = log_activity.user_id')
                    ->orderBy('id', 'DESC')->limit(5)->get()->getResult();
    }
}

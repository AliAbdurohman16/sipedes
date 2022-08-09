<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'id', 'name', 'username', 'password', 'telephone', 'id_role', 'created_at', 'updated_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getUser($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }

        return $this->where(['username' => $username])->first();
    }
}

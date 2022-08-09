<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RtModel;

class Rt extends BaseController
{
    protected $db, $rtModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->rtModel = new RtModel();
    }

    public function index()
    {
        //user
        $builder = $this->db->table('user');
        $builder->select('*, user.name as user_name, role.name as role_name');
        $builder->join('role', 'role.id = user.id_role');
        $builder->where('user.id', session()->get('id'));
        $query = $builder->get()->getRow();

        //rt
        $rt = $this->rtModel->findAll();

        $data = [
            'title' => 'RT',
            'user' => $query,
            'rt' => $rt
        ];

        return view('Rt/index', $data);
    }


    public function save()
    {
    }
}

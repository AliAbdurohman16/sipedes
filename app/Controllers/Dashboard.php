<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $builder = $this->db->table('user');
        $builder->select('*, user.name as user_name, role.name as role_name');
        $builder->join('role', 'role.id = user.id_role');
        $builder->where('user.id', session()->get('id'));
        $query = $builder->get()->getRow();

        $data = [
            'title' => 'Dashboard',
            'user' => $query
        ];

        return view('dashboard/index', $data);
    }
}

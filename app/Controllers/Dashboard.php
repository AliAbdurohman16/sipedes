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
        $builder = $this->db->table('users');
        $builder->select('*, users.name as user_name, roles.name as role_name');
        $builder->join('roles', 'roles.id = users.role_id');
        $builder->where('users.id', session()->get('id'));
        $query = $builder->get()->getRow();

        $data = [
            'title' => 'Dashboard',
            'user' => $query
        ];

        return view('dashboard/index', $data);
    }
}

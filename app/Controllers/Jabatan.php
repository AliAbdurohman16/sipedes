<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    protected $jabatanModel;

    public function __construct()
    {
        $this->jabatanModel = new JabatanModel();
    }

    public function index()
    {
        $jabatan = $this->jabatanModel->findAll();
        $data = [
            'jabatans' => $jabatan,
            'title' => 'Jabatan'
        ];

        return view('jabatan/index', $data);
    }
}

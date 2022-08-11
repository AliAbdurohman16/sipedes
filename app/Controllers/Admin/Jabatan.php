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

    public function create()
    {
        if (!$this->validate([
            'name' => 'required|min_length[3]|string',
            'number' => 'required|integer',
            'dusun_id' => 'required|integer'
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'dusun_id' => $this->request->getPost('dusun_id')
        ];

        $result = $this->model->save($request);

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data RW Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data RW Tidak Berhasil');
        }

        return redirect()->to('admin/data_rw');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;

class JabatanController extends BaseController
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
            'title' => 'Jabatan',
            'jabatans' => $jabatan
        ];

        return view('admin/data-master/jabatan/index', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'name' => 'required|string',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'name' => $this->request->getPost('name'),
        ];

        $result = $this->jabatanModel->save($request);

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Jabatan Berhasil');
        } else {
            session()->setFlashdata('error', 'Tambah Data Jabatan Tidak Berhasil');
        }

        return redirect()->to('data_jabatan');
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'name' => 'required|string',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'name' => $this->request->getPost('name'),
        ];

        $result = $this->jabatanModel->update($id, $request);

        if ($result) {
            session()->setFlashdata('message', 'Edit Data Jabatan Berhasil');
        } else {
            session()->setFlashdata('error', 'Edit Data Jabatan Tidak Berhasil');
        }

        return redirect()->to('data_jabatan');
    }

    public function delete($id = null)
    {
        $result = $this->jabatanModel->delete($id);

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Jabatan Berhasil');
        } else {
            session()->setFlashdata('error', 'Hapus Data Jabatan Tidak Berhasil');
        }

        return redirect()->to('data_jabatan');
    }
}

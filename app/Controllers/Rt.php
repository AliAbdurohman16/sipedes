<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\RtModel;
use App\Models\RwModel;

class Rt extends BaseController
{
    public function __construct()
    {
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
    }

    public function index()
    {
        $rts = $this->rtModel->withRw();

        $data = [
            'title' => 'RT',
            'rts' => $rts
        ];

        return view('Rt/index', $data);
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title'  => 'Tambah Data RT',
                'rw'     => $this->rwModel->findAll(),
            ];

            $view = [
                'data' => view('Rt/add', $data)
            ];

            echo json_encode($view);
        }
    }

    public function save()
    {
        $name = $this->request->getVar('name');
        $no_rt = $this->request->getVar('no_rt');
        $no_rw = $this->request->getVar('no_rw');

        $paramRt = [
            'name'   => $name,
            'number' => $no_rt,
            'rw_id'  => $no_rw,
        ];

        $this->rtModel->insert($paramRt);

        $message = [
            'success' => 'Data RT berhasil ditambahkan'
        ];

        session()->setFlashdata($message);
        return redirect()->to('/rt');
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'rt'    => $this->rtModel->find($id),
                'rw'    => $this->rwModel->findAll(),
            ];

            $view = [
                'data' => view('Rt/edit', $data)
            ];

            echo json_encode($view);
        }
    }

    public function update($id)
    {
        $name = $this->request->getVar('name');
        $no_rt = $this->request->getVar('no_rt');
        $no_rw = $this->request->getVar('no_rw');

        $paramRt = [
            'name'   => $name,
            'number' => $no_rt,
            'rw_id'  => $no_rw,
        ];

        $this->rtModel->update($id, $paramRt);

        $message = [
            'success' => 'Data RT berhasil diubah!'
        ];

        session()->setFlashdata($message);
        return redirect()->to('/rt');
    }

    public function destroy($id)
    {
        $this->rtModel->delete($id);

        $message = [
            'success' => 'Data RT berhasil dihapus!'
        ];

        session()->setFlashdata($message);
        return redirect()->to('/rt');
    }
}

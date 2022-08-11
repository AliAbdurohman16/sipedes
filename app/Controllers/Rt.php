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
            'title' => 'Data Rukun Tetangga',
            'rts' => $rts
        ];

        return view('Rt/index', $data);
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $data = [
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
        $paramRt = [
            'name'   => $this->request->getVar('name'),
            'number' => $this->request->getVar('no_rt'),
            'rw_id'  => $no_rw = $this->request->getVar('no_rw'),
        ];

        $result = $this->rtModel->insert($paramRt);

        if ($result) {
            session()->setFlashdata('success', 'Data RT berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Data RT gagal ditambahkan!');
        }

        return redirect()->to('/rt');
    }

    public function edit($id)
    {
        if ($this->request->isAJAX()) {

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
        $paramRt = [
            'name'   => $this->request->getVar('name'),
            'number' => $this->request->getVar('no_rt'),
            'rw_id'  => $no_rw = $this->request->getVar('no_rw'),
        ];

        $result = $this->rtModel->update($id, $paramRt);

        if ($result) {
            session()->setFlashdata('success', 'Data RT berhasil diubah!');
        } else {
            session()->setFlashdata('error', 'Data RT gagal diubah!');
        }

        return redirect()->to('/rt');
    }

    public function destroy($id)
    {
        if ($this->request->isAJAX()) {

            $this->rtModel->delete($id);

            $message = [
                'success' => 'Data RT berhasil dihapus!'
            ];
    
            echo json_encode($message);
        }
    }
}

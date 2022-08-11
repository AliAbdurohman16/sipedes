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
        // if(!$this->validate([
        //     'name' => 'required|min_length[3]|string',
        //     'no_rt' => 'required|integer',
        //     'dusun_id' => 'required|integer'
        // ])){
        //     session()->setFlashdata('error', $this->validator->listErrors());

        //     return redirect()->back()->withInput();
        // }

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
        // if(!$this->validate([
        //     'name' => 'required|min_length[3]|string',
        //     'no_rt' => 'required|integer',
        //     'dusun_id' => 'required|integer'
        // ])){
        //     session()->setFlashdata('error', $this->validator->listErrors());

        //     return redirect()->back()->withInput();
        // }

        $paramRt = [
            'name'   => $this->request->getVar('name'),
            'number' => $this->request->getVar('no_rt'),
            'rw_id'  => $no_rw = $this->request->getVar('no_rw'),
        ];

        $result = $this->rtModel->update($id, $paramRt);

        if ($result) {
            session()->setFlashdata('success', 'Data RT berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Data RT gagal ditambahkan!');
        }

        return redirect()->to('/rt');
    }

    public function destroy()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $this->rtModel->delete($id);

            $message = [
                'success' => 'Data RT berhasil dihapus'
            ];
    
            echo json_encode($message);
        }
    }
}

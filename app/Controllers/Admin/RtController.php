<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RtModel;
use App\Models\RwModel;

class RtController extends BaseController
{
    public function __construct()
    {
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $rts = $this->rtModel->withRw();

            $data = [
                'rts' => $rts
            ];

            $msg = [
                'data' => view('admin/data-master/Rt/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Rukun Tetangga (RW)'
            ];
    
            return view('admin/data-master/Rt/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'rws'     => $this->rwModel->findAll(),
            ];

            $view = [
                'data' => view('admin/data-master/Rt/add', $data)
            ];

            echo json_encode($view);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'name' => [
                        'label' => 'Nama Ketua RT',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'number' => [
                        'label' => 'Nomor RT',
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'integer' => '{field} harus berupa angka'
                        ]
                    ],
                    'rw_id' => [
                        'label' => 'Nomor RW',
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'integer' => '{field} harus berupa angka'
                        ]
                    ]
                ]
            );
            
            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name'),
                        'number' => $validation->getError('number'),
                        'rw_id' => $validation->getError('rw_id')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'number' => $this->request->getPost('number'),
                    'rw_id' => $this->request->getPost('rw_id')
                ];

                $this->rtModel->save($request);
                $msg = ['success' => 'Data RT berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $row = $this->rtModel->find($id);

            $rws = $this->rwModel->findAll();

            $data = [
                'id' => $row->id,
                'name' => $row->name,
                'number' => $row->number,
                'rw_id' => $row->rw_id,
                'rws' => $rws
            ];

            $msg = ['success' => view('admin/data-master/Rt/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'name' => [
                        'label' => 'Nama Ketua RT',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'number' => [
                        'label' => 'Nomor RT',
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'integer' => '{field} harus berupa angka'
                        ]
                    ],
                    'rw_id' => [
                        'label' => 'Nomor RW',
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'integer' => '{field} harus berupa angka'
                        ]
                    ]
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name'),
                        'number' => $validation->getError('number'),
                        'rw_id' => $validation->getError('rw_id')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'number' => $this->request->getPost('number'),
                    'rw_id' => $this->request->getPost('rw_id'),
                ];

                $id = $this->request->getVar('id');

                $this->rtModel->update($id, $request);
                $msg = ['success' => 'Data RT berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost();
            $this->rtModel->delete($id);
            $msg = ['success' => 'Data RT berhasil di hapus'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\LogAktivitasModel;
use CodeIgniter\I18n\Time;

class RtController extends BaseController
{
    public function __construct()
    {
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $rts = $this->rtModel->withRw();

            $data = [
                'rts' => $rts
            ];

            $msg = [
                'data' => view('admin/data-master/rt/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Rukun Tetangga (RT)'
            ];
    
            return view('admin/data-master/rt/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'rws'     => $this->rwModel->findAll(),
            ];

            $view = [
                'data' => view('admin/data-master/rt/add', $data)
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

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Tambah Data RT',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

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

            $msg = ['success' => view('admin/data-master/rt/edit', $data)];
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

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Edit Data RT',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

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
            // Log Activity
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data RT',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            $msg = ['success' => 'Data RT berhasil di hapus'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RwModel;
use App\Models\DusunModel;
use App\Models\LogActivityModel;
use CodeIgniter\I18n\Time;

class RwController extends BaseController
{
    protected $rwModel, $dusunModel;

    public function __construct()
    {
        $this->rwModel = new RwModel();
        $this->dusunModel = new DusunModel();
        $this->logModel = new LogActivityModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $rws = $this->rwModel->withDusun();

            $data = [
                'rws' => $rws
            ];

            $msg = [
                'data' => view('admin/data-master/rw/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Rukun Warga (RW)'
            ];

            return view('admin/data-master/rw/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $dusuns = $this->dusunModel->findAll();

            $data = [
                'dusuns' => $dusuns
            ];

            $msg = [
                'data' => view('admin/data-master/rw/add', $data)
            ];

            echo json_encode($msg);
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
                        'label' => 'Nama Ketua RW',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'number' => [
                        'label' => 'Nomor RW',
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'integer' => '{field} harus berupa angka'
                        ]
                    ],
                    'dusun_id' => [
                        'label' => 'Nama Dusun',
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
                        'dusun_id' => $validation->getError('dusun_id')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'number' => $this->request->getPost('number'),
                    'dusun_id' => $this->request->getPost('dusun_id')
                ];

                $this->rwModel->save($request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'information'   => 'Tambah Data RW',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data RW berhasil di simpan'];
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

            $row = $this->rwModel->find($id);

            $dusuns = $this->dusunModel->findAll();

            $data = [
                'id' => $row->id,
                'name' => $row->name,
                'number' => $row->number,
                'dusun_id' => $row->dusun_id,
                'dusuns' => $dusuns
            ];

            $msg = ['success' => view('admin/data-master/rw/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $oldJabatan = $this->rwModel->find($id);

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'name' => [
                        'label' => 'Nama Ketua RW',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'number' => [
                        'label' => 'Nomor RW',
                        'rules' => 'required|integer',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'integer' => '{field} harus berupa angka'
                        ]
                    ],
                    'dusun_id' => [
                        'label' => 'Nama Dusun',
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
                        'dusun_id' => $validation->getError('dusun_id')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'number' => $this->request->getPost('number'),
                    'dusun_id' => $this->request->getPost('dusun_id'),
                ];

                $id = $this->request->getVar('id');

                $this->rwModel->update($id, $request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'information'   => 'Edit Data RW',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data RW berhasil di simpan'];
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
            $this->rwModel->delete($id);
            // Log Activity
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data RW',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            $msg = ['success' => 'Data RW berhasil di hapus'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

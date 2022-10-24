<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\DusunModel;
use App\Models\LogAktivitasModel;
use CodeIgniter\I18n\Time;

class DusunController extends BaseController
{
    protected $dusunModel;

    public function __construct()
    {
        $this->dusunModel = new DusunModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $dusun = $this->dusunModel->findAll();

            $data = [
                'dusuns' => $dusun
            ];

            $msg = [
                'data' => view('admin/data-master/dusun/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Dusun'
            ];
    
            return view('admin/data-master/dusun/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/data-master/dusun/add')
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
                        'label' => 'Nama dusun',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ]
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                ];

                $this->dusunModel->save($request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Tambah Data Dusun',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data dusun berhasil di simpan'];
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

            $row = $this->dusunModel->find($id);

            $data = [
                'id' => $row->id,
                'name' => $row->name
            ];

            $msg = ['success' => view('admin/data-master/dusun/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        $oldJabatan = $this->dusunModel->find($id);

        if ($oldJabatan->name == $this->request->getVar('name')) {
            $rules_name = 'required';
        } else {
            $rules_name = 'required|string';
        }

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'name' => [
                        'label' => 'Nama jabatan',
                        'rules' => $rules_name,
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ]
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                ];

                $id = $this->request->getVar('id');

                $this->dusunModel->update($id, $request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Edit Data Dusun',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data dusun berhasil di simpan'];
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
            $this->dusunModel->delete($id);
            // Log Activity
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data Dusun',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            $msg = ['success' => 'Data dusun berhasil di hapus'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\LogAktivitasModel;
use CodeIgniter\I18n\Time;

class JabatanController extends BaseController
{
    protected $jabatanModel;

    public function __construct()
    {
        $this->jabatanModel = new JabatanModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $jabatan = $this->jabatanModel->findAll();
            $data = [
                'title' => 'Data Jabatan',
                'jabatans' => $jabatan
            ];

            $msg = [
                'data' => view('admin/data-master/jabatan/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Jabatan'
            ];

            return view('admin/data-master/jabatan/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/data-master/jabatan/add')
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
                        'label' => 'Nama jabatan',
                        'rules' => 'required|is_unique[jabatan.name]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah tersedia'
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

                $this->jabatanModel->save($request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Tambah Data Jabatan',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data jabatan berhasil di simpan'];
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

            $row = $this->jabatanModel->find($id);

            $data = [
                'id' => $row->id,
                'name' => $row->name
            ];

            $msg = ['success' => view('admin/data-master/jabatan/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $oldJabatan = $this->jabatanModel->find($id);

        if ($oldJabatan->name == $this->request->getVar('name')) {
            $rules_name = 'required';
        } else {
            $rules_name = 'required|is_unique[jabatan.name]';
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
                            'is_unique' => '{field} sudah tersedia'
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

                $this->jabatanModel->update($id, $request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Edit Data Jabatan',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data jabatan berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            exit("Maaf data tidak dapat di proses");
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost();
            $this->jabatanModel->delete($id);
            // Log Activity
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data Jabatan',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            $msg = ['success' => 'Data jabatan berhasil di hapus'];
            echo json_encode($msg);
        } else {
            exit("Maaf data tidak dapat di proses");
        }
    }
}

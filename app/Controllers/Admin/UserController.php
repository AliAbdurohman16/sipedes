<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\RoleModel;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $users = $this->userModel->withRole();

            $data = [
                'users' => $users
            ];

            $msg = [
                'data' => view('admin/user/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Pengguna'
            ];

            return view('admin/user/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'roles'     => $this->roleModel->findAll(),
            ];

            $view = [
                'data' => view('admin/user/add', $data)
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
                        'label' => 'Nama Lengkap',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'username' => [
                        'label' => 'Username',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'password' => [
                        'label' => 'Kata Sandi',
                        'rules' => 'required|string|min_length[5]|matches[confirm_password]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'matches' => '{field} tidak sama dengan {param}',
                        ]
                    ],
                    'confirm_password' => [
                        'label' => 'Konfirmasi Kata Sandi',
                        'rules' => 'required|string|min_length[5]|matches[password]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'matches' => '{field} tidak sama dengan {param}',
                        ]
                    ],
                    'telephone' => [
                        'label' => 'Nomor Telepon',
                        'rules' => 'required|numeric|min_length[10]|max_length[13]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'numeric' => '{field} harus berupa angka',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'max_length' => '{field} maksimal memiliki panjang {param} karakter',
                        ]
                    ],
                    'role_id' => [
                        'label' => 'Hak Akses',
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
                        'username' => $validation->getError('username'),
                        'password' => $validation->getError('password'),
                        'confirm_password' => $validation->getError('confirm_password'),
                        'telephone' => $validation->getError('telephone'),
                        'role_id' => $validation->getError('role_id')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'telephone' => $this->request->getPost('telephone'),
                    'role_id' => $this->request->getPost('role_id')
                ];

                $this->userModel->save($request);
                $msg = ['success' => 'Data Pengguna berhasil di simpan'];
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

            $row = $this->userModel->find($id);

            $roles = $this->roleModel->findAll();

            $data = [
                'id' => $row->id,
                'name' => $row->name,
                'username' => $row->username,
                'password' => $row->password,
                'telephone' => $row->telephone,
                'role_id' => $row->role_id,
                'roles' => $roles
            ];

            $msg = ['success' => view('admin/user/edit', $data)];
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
                        'label' => 'Nama Lengkap',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'username' => [
                        'label' => 'Username',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric'
                        ]
                    ],
                    'password' => [
                        'label' => 'Kata Sandi',
                        'rules' => 'required|string|min_length[5]|matches[confirm_password]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'matches' => '{field} tidak sama dengan {param}',
                        ]
                    ],
                    'confirm_password' => [
                        'label' => 'konfirmasi kata sandi',
                        'rules' => 'required|string|min_length[5]|matches[password]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'matches' => '{field} tidak sama dengan {param}',
                        ]
                    ],
                    'telephone' => [
                        'label' => 'Nomor Telepon',
                        'rules' => 'required|numeric|min_length[10]|max_length[13]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'numeric' => '{field} harus berupa angka',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'max_length' => '{field} maksimal memiliki panjang {param} karakter',
                        ]
                    ],
                    'role_id' => [
                        'label' => 'Hak Akses',
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
                        'username' => $validation->getError('username'),
                        'password' => $validation->getError('password'),
                        'confirm_password' => $validation->getError('confirm_password'),
                        'telephone' => $validation->getError('telephone'),
                        'role_id' => $validation->getError('role_id')
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'telephone' => $this->request->getPost('telephone'),
                    'role_id' => $this->request->getPost('role_id')
                ];

                $id = $this->request->getVar('id');

                $this->userModel->update($id, $request);
                $msg = ['success' => 'Data Pengguna berhasil di simpan'];
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
            $this->userModel->delete($id);
            $msg = ['success' => 'Data Pengguna berhasil di hapus'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

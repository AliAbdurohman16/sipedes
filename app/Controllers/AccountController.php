<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class AccountController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->find(session()->get('user')->id);

        $data = [
            'title' => 'Akun Saya',
            'users' => $users
        ];

        return view('account/index', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $row = $this->userModel->find($id);
        if ($row->username == $this->request->getVar('username')) {
            $rules_username = 'required|string|alpha_dash';
        } else {
            $rules_username = 'required|is_unique[users.username]|string|alpha_dash';
        }

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
                        'rules' => $rules_username,
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'string' => '{field} harus berupa alphanumeric',
                            'is_unique' => '{field} sudah ada, Silahkan ganti dengan yang lain',
                            'alpha_dash' => '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung',
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
                    ]
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name'),
                        'username' => $validation->getError('username'),
                        'telephone' => $validation->getError('telephone'),
                    ]
                ];
            } else {
                $request = [
                    'name' => $this->request->getPost('name'),
                    'username' => $this->request->getPost('username'),
                    'telephone' => $this->request->getPost('telephone'),
                ];

                $id = $this->request->getVar('id');

                $this->userModel->update($id, $request);
                $msg = ['success' => 'Profil berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function changePassword()
    {
        // 
    }
}

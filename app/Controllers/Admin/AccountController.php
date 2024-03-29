<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\LogAktivitasModel;
use CodeIgniter\I18n\Time;

class AccountController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        $users = $this->userModel->find(session()->get('user')->id);

        $data = [
            'title'      => 'Akun Saya',
            'users'      => $users,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/account/index', $data);
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
            $valid = $this->validate([
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
                ],
                'image' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[image,image/png,image/jpg,image/jpeg]|is_image[image]|max_size[image,2024]',
                    'errors' => [
                        'mime_in' => '{field} yang anda pilih bukan gambar berformat jpg,jpeg,png',
                        'is_image' => '{field} yang anda pilih bukan gambar',
                        'max_size' => '{field} ukurannya tidak boleh lebih dari 2MB',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name'),
                        'username' => $validation->getError('username'),
                        'telephone' => $validation->getError('telephone'),
                        'image' => $validation->getError('image')
                    ]
                ];
            } else {

                $id = $this->request->getVar('id');
                $row = $this->userModel->find($id);
                $file_image = $this->request->getFile('image');
                $file_image_old = $this->request->getVar('old_image');

                if ($file_image->getError() == 4) {
                    $file_name = $file_image_old;
                } else {
                    $file_name = $file_image->getRandomName();
                    $file_image->move('images/avatar', $file_name);
                    if ($row->image != 'Avatar.png') {
                        unlink('images/avatar/' . $file_image_old);
                    }
                }

                $request = [
                    'name'      => $this->request->getPost('name'),
                    'username'  => $this->request->getPost('username'),
                    'telephone' => $this->request->getPost('telephone'),
                    'image'     => $file_name,
                ];

                $this->userModel->update($id, $request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Ubah Profil',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Profil berhasil diubah!'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function changePassword()
    {
        $id = $this->request->getVar('id');
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'oldPassword' => [
                        'label' => 'Kata Sandi Lama',
                        'rules' => 'required|min_length[5]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                        ]
                    ],
                    'newPassword' => [
                        'label' => 'Kata Sandi Baru',
                        'rules' => 'required|min_length[5]|matches[confirmPassword]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'matches' => '{field} tidak sama dengan {param}',
                        ]
                    ],
                    'confirmPassword' => [
                        'label' => 'Konfirmasi Kata Sandi',
                        'rules' => 'required|min_length[5]|matches[newPassword]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'matches' => '{field} tidak sama dengan {param}',
                        ]
                    ],
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'oldPassword' => $validation->getError('oldPassword'),
                        'newPassword' => $validation->getError('newPassword'),
                        'confirmPassword' => $validation->getError('confirmPassword'),
                    ]
                ];
                echo json_encode($msg);
            } else {
                $id = $this->request->getVar('id');
                $check = $this->userModel->find($id);

                if ($check) {
                    if (password_verify($this->request->getVar('oldPassword'), $check->password)) {
                        $result = [
                            'password' => password_hash($this->request->getVar('newPassword'), PASSWORD_DEFAULT)
                        ];

                        $this->userModel->update($id, $result);

                        // Log Activity
                        $params = [
                            'user_id'       => session()->get('user')->id,
                            'activities'    => 'Ubah Kata Sandi',
                            'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                        ];

                        $this->logModel->insert($params);

                        $msg = [
                            'success' => 'Kata Sandi berhasil di ubah!',
                        ];
                    } else {
                        $msg = [
                            'wrong' => 'Kata Sandi anda yang lama salah!',
                        ];
                    }
                    echo json_encode($msg);
                }
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

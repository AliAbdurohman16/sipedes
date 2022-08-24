<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\LogActivityModel;
use CodeIgniter\I18n\Time;

class Login extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->logModel = new LogActivityModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Masuk',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function valid_login()
    {
        if (!$this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'alpha_dash' => '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('/login')->withInput();
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $checkUser = $this->userModel->getUser($username);

        if ($checkUser) {
            $passworUser = $checkUser->password;

            if (password_verify($password, $passworUser)) {
                $roleUser = $this->roleModel->getRole($checkUser->role_id);

                session()->set('user', $checkUser);
                session()->set('role', $roleUser);

                $status = [
                    'status' => 'Online'
                ];

                $id = session()->get('user')->id;
                $this->userModel->update($id, $status);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'information'   => 'Masuk',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                return redirect()->to('admin/dashboard');
            } else {
                $sessError = [
                    'error_message' => 'Password yang anda masukan salah!'
                ];

                session()->setFlashdata($sessError);

                return redirect()->to('/login');
            }
        } else {
            $sessError = [
                'error_message' => 'Maaf, user tidak terdaftar!'
            ];

            session()->setFlashdata($sessError);

            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $status = [
            'status' => 'Offline'
        ];

        $id = session()->get('user')->id;
        $this->userModel->update($id, $status);

        // Log Activity
        $params = [
            'user_id'       => session()->get('user')->id,
            'information'   => 'Keluar',
            'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->logModel->insert($params);

        session()->destroy();

        return redirect()->to('/login');
    }
}

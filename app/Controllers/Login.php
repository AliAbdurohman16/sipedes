<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\RoleModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('login/index', $data);
    }

    public function valid_login()
    {
        if (!$this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
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

                return redirect()->to('/dashboard');
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
        session()->destroy();

        return redirect()->to('/login');
    }
}

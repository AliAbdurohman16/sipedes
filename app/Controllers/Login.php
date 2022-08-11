<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        session();
        if (session()->id_role > 0) {
            return redirect()->to(site_url('dashboard'));
        }
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('login/index', $data);
    }

    public function valid_login()
    {
        if (session()->id_role > 0) {
            return redirect()->to(site_url('dashboard'));
        }
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

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $cekUserLogin = $this->userModel->getUser($username);

        if ($cekUserLogin != null) {
            $passworUser = $cekUserLogin->password;

            if (password_verify($password, $passworUser)) {
                $session = [
                    'id' => $cekUserLogin->id,
                    'id_role' => $cekUserLogin->role_id,
                ];

                session()->set($session);
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

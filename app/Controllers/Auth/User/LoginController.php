<?php

namespace App\Controllers\Auth\User;

use App\Controllers\BaseController;
use App\Models\AnggotaPendudukModel;
use App\Models\RoleModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new AnggotaPendudukModel();
        $this->roleModel = new RoleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Masuk',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/user/login', $data);
    }

    public function valid_login()
    {
        if (!$this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'min_length' => '{field} harus 16 angka',
                    'max_length' => '{field} harus 16 angka',
                ]
            ],
        ])) {
            return redirect()->to('/login')->withInput();
        }

        $nik = $this->request->getPost('nik');

        $checkUser = $this->userModel->getUser($nik);

        if ($checkUser) {
            $roleUser = $this->roleModel->getRole($checkUser->role_id);
            session()->set('penduduk', $checkUser);
            session()->set('role', $roleUser);

            return redirect()->to('user/dashboard');
        } else {
            $sessError = [
                'error_message' => 'Maaf, NIK yang anda masukkan salah!'
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

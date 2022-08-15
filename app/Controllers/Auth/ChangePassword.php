<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\UserModel;

class ChangePassword extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Ubah Kata Sandi',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/changePassword', $data);
    }

    public function send()
    {
        if (!$this->validate([
            'password' => [
                'label' => 'Kata Sandi Baru',
                'rules' => 'required|min_length[5]|matches[confirm_password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
            'confirm_password' => [
                'label' => 'Konfirmasi Kata Sandi',
                'rules' => 'required|min_length[5]|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
        ])) {
            return redirect()->to('/change_password')->withInput();
        }

        $session = session('user');

        $param = [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $this->db->table('users')->where(['username' => $session])->update($param);
        session()->remove('user');
        $sessSucc = [
            'success' => 'Kata sandi berhasil diubah!'
        ];

        session()->setFlashdata($sessSucc);

        return redirect()->to('/login');
    }
}

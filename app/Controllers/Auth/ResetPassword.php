<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\LogActivityModel;
use CodeIgniter\I18n\Time;

class ResetPassword extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->logModel = new LogActivityModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Reset Kata Sandi',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/resetPassword', $data);
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
            return redirect()->to('/reset_password')->withInput();
        }

        $id = session('id');

        $param = [
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $this->userModel->update($id, $param);

        // Log Activity
        $params = [
            'user_id'       => $id,
            'information'   => 'Reset Kata Sandi',
            'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->logModel->insert($params);

        session()->remove('user');
        $sessSucc = [
            'success' => 'Kata sandi berhasil diubah!'
        ];

        session()->setFlashdata($sessSucc);

        return redirect()->to('/login');
    }
}

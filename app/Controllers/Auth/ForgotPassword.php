<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\UserModel;

class ForgotPassword extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Lupa Kata Sandi',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/forgotPassword', $data);
    }

    public function send()
    {
        if (!$this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'alpha_dash' => '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung.',
                ]
            ]
        ])) {
            return redirect()->to('/forgot_password')->withInput();
        }

        $username = $this->request->getVar('username');
        $check = $this->userModel->getWhere(['username' => $username])->getRow();

        if ($check) {
            session()->set('id', $check->id);
            session()->set('user', $check->username);
            return redirect()->to('/change_password');
        } else {
            $sessError = [
                'error_message' => 'Username yang anda masukan salah!'
            ];

            session()->setFlashdata($sessError);

            return redirect()->to('/forgot_password');
        }
    }
}

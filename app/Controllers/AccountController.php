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
}

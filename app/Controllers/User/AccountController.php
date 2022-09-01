<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class AccountController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Akun Saya',
        ];

        return view('user/account/index', $data);
    }
}

<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('user/dashboard/index', $data);
    }
}

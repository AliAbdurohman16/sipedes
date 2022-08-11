<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        dd(session()->get('user'));
        // $data = [
        //     'title' => 'Dashboard'
        // ];

        // return view('dashboard/index', $data);
    }
}

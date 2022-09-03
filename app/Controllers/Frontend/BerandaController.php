<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class BerandaController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Beranda'];
        return view('frontend/beranda', $data);
    }
}

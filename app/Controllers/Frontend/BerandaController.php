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

    public function tentang()
    {
        $data = ['title' => 'Tentang'];
        return view('frontend/tentang', $data);
    }

    public function kontak()
    {
        $data = ['title' => 'Kontak'];
        return view('frontend/kontak', $data);
    }
}

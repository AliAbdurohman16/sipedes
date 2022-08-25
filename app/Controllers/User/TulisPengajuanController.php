<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;

class TulisPengajuanController extends BaseController
{
    public function __construct()
    {
        $this->pengajuanModel = new PengajuanModel();
        $this->pendudukModel = new PendudukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tulis Pengajuan',
            'validation' => \Config\Services::validation()
        ];

        return view('user/pengajuan/tulis_pengajuan', $data);
    }

    public function create()
    {
        $nik = $this->request->getVar('no_kk');
    }
}

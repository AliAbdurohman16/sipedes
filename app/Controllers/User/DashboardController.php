<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->pengajuanModel = new PengajuanModel();
    }

    public function index()
    {
        $nik = session()->get('penduduk')->nik;

        $data = [
            'title' => 'Dashboard',
            'dikirim' => $this->pengajuanModel->where('status', 'Belum Dibuat')->where('nik', $nik)->get()->getNumRows(),
            'sdh_dibuat' => $this->pengajuanModel->where('status', 'Sudah Dibuat')->where('nik', $nik)->get()->getNumRows(),
        ];

        return view('user/dashboard/index', $data);
    }
}

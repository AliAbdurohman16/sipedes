<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\AparatDesaModel;
use App\Models\PengajuanModel;
use App\Models\UserModel;
use App\Models\LogAktivitasModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
        $this->aparatModel = new AparatDesaModel();
        $this->pengajuanModel = new PengajuanModel();
        $this->userModel = new UserModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'penduduk' => $this->pendudukModel->get()->getNumRows(),
            'rt' => $this->rtModel->get()->getNumRows(),
            'rw' => $this->rwModel->get()->getNumRows(),
            'aparat' => $this->aparatModel->get()->getNumRows(),
            'pddk_laki' => $this->pendudukModel->where('jenis_kelamin', 'L')->get()->getNumRows(),
            'pddk_pr' => $this->pendudukModel->where('jenis_kelamin', 'P')->get()->getNumRows(),
            'blm_dibuat' => $this->pengajuanModel->where('status', 'Belum Dibuat')->get()->getNumRows(),
            'sdh_dibuat' => $this->pengajuanModel->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'users' => $this->userModel->findAll(),
            'logs' => $this->logModel->withLimit(),
            'statistics' => $this->pengajuanModel->select('COUNT(jenis) as jumlah, jenis')->where('status', 'Sudah Dibuat')->groupBy('jenis')->findAll()
        ];

        return view('admin/dashboard/index', $data);
    }
}

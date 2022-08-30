<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\AparatDesaModel;
use App\Models\PengajuanModel;
use App\Models\UserModel;
use App\Models\LogActivityModel;

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
        $this->logModel = new LogActivityModel();
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
        ];

        return view('user/dashboard/index', $data);
    }
}

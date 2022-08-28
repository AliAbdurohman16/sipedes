<?php

namespace App\Controllers\Admin;

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
            'users' => $this->userModel->findAll(),
            'logs' => $this->logModel->withLimit(),
            'ketNama' => $this->pengajuanModel->where('jenis', 'Keterangan Nama')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketDomisli' => $this->pengajuanModel->where('jenis', 'Keterangan Domisli')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketBlmNikah' => $this->pengajuanModel->where('jenis', 'Keterangan Belum Nikah')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketLahir' => $this->pengajuanModel->where('jenis', 'Keterangan Lahir')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketPenghasilan' => $this->pengajuanModel->where('jenis', 'Keterangan Penghasilan')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketPindahKK' => $this->pengajuanModel->where('jenis', 'Keterangan Pindah KK')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketRame' => $this->pengajuanModel->where('jenis', 'Keterangan Rame-rame')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketSKU' => $this->pengajuanModel->where('jenis', 'Keterangan SKU')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketSKTM' => $this->pengajuanModel->where('jenis', 'Keterangan SKTM')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketSKCK' => $this->pengajuanModel->where('jenis', 'Keterangan SKCK')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
            'ketKematian' => $this->pengajuanModel->where('jenis', 'Keterangan Kematian')->where('status', 'Sudah Dibuat')->get()->getNumRows(),
        ];

        return view('admin/dashboard/index', $data);
    }
}

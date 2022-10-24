<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;

class PengajuanDibuatController extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->pengajuanModel = new PengajuanModel();
        $this->pendudukModel = new PendudukModel();
        $this->kartuKeluargaModel = new KartuKeluargaModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $nik = session()->get('penduduk')->nik;

            $pd = $this->pengajuanModel->where('status', 'Sudah Dibuat')->where('nik', $nik)->orderBy('updated_at','DESC')->get()->getResult();

            $data = [
                'pds' => $pd
            ];

            $msg = [
                'data' => view('user/pengajuan/pengajuan_sudah_dibuat/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Pengajuan Sudah Dibuat'
            ];

            return view('user/pengajuan/pengajuan_sudah_dibuat/index', $data);
        }
    }

    public function download($id)
    {
        $data = $this->pengajuanModel->find($id);
		return $this->response->download('document/surat/' . $data->file, null);
    }
}

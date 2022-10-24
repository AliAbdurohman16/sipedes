<?php

namespace App\Controllers\Admin\Surat;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;

class KeteranganRameRameController extends BaseController
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
            $pd = $this->pengajuanModel->where('jenis', 'Keterangan Rame-rame')->where('status', 'Sudah Dibuat')->get()->getResult();

            $data = [
                'pds' => $pd
            ];

            $msg = [
                'data' => view('admin/surat/keterangan_rame_rame/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Surat Keterangan Rame-rame'
            ];

            return view('admin/surat/keterangan_rame_rame/index', $data);
        }
    }

    public function detail()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'pd' => $this->pengajuanModel->find($id),
            ];

            $msg = ['success' => view('admin/surat/keterangan_rame_rame/detail', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function download($id)
    {
        $data = $this->pengajuanModel->find($id);
		return $this->response->download('dokumen/surat/' . $data->file, null);
    }
}

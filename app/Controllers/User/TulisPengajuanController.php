<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;
use CodeIgniter\I18n\Time;

class TulisPengajuanController extends BaseController
{
    public function __construct()
    {
        $this->pengajuanModel = new PengajuanModel();
        $this->pendudukModel = new PendudukModel();
        $this->kartuKeluargaModel = new KartuKeluargaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tulis Pengajuan',
            'validation' => \Config\Services::validation()
        ];

        return view('user/pengajuan/tulis_pengajuan/index', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'telepon' => [
                'label' => 'No Telepon',
                'rules' => 'required|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'max_length' => '{field} maksimal memiliki panjang {param} karakter'
                ]
            ],
            'jenis' => [
                'label' => 'Jenis Pengajuan Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('user/tulis_pengajuan')->withInput();
        }

        $nik = session()->get('penduduk')->nik;
        $checkNik = $this->pendudukModel->getWhere(['nik' => $nik])->getRow();
        $result = [
            'no_kk' => session()->get('penduduk')->no_kk,
            'nik' => $nik,
            'nama' => $checkNik->name,
            'telepon' => $this->request->getVar('telepon'),
            'jenis' => $this->request->getVar('jenis'),
            'keterangan' => $this->request->getVar('keterangan'),
            'created_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->pengajuanModel->insert($result);

        $sessSuccess = [
            'success_message' => 'Pengajuan anda berhasil dikirim!'
        ];

        session()->setFlashdata($sessSuccess);

        return redirect()->to('user/tulis_pengajuan');
    }
}

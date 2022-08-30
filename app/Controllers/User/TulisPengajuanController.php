<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;

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
            'no_kk' => [
                'label' => 'No Kartu Keluarga',
                'rules' => 'required|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'min_length' => '{field} harus memiliki panjang {param} angka',
                    'max_length' => '{field} harus memiliki panjang {param} angka'
                ]
            ],
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required|min_length[16]|max_length[16]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'min_length' => '{field} harus memiliki panjang {param} angka',
                    'max_length' => '{field} harus memiliki panjang {param} angka'
                ]
            ],
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

        $no_kk = $this->request->getVar('no_kk');
        $checkNoKK = $this->kartuKeluargaModel->getWhere(['no_kk' => $no_kk])->getRow();
        
        if ($checkNoKK) {
            $nik = $this->request->getVar('nik');
            $checkNik = $this->pendudukModel->getWhere(['nik' => $nik])->getRow();
            if ($checkNik) {
                $result = [
                    'no_kk' => $no_kk,
                    'nik' => $nik,
                    'nama' => $checkNik->name,
                    'telepon' => $this->request->getVar('telepon'),
                    'jenis' => $this->request->getVar('jenis'),
                    'keterangan' => $this->request->getVar('keterangan'),
                ];

                $this->pengajuanModel->insert($result);

                $sessSuccess = [
                    'success_message' => 'Pengajuan anda berhasil dikirim!'
                ];
    
                session()->setFlashdata($sessSuccess);
    
                return redirect()->to('user/tulis_pengajuan');
            } else {
                $sessError = [
                    'error_message' => 'NIK yang anda masukan salah!'
                ];
    
                session()->setFlashdata($sessError);
    
                return redirect()->to('user/tulis_pengajuan');
            }
        } else {
            $sessError = [
                'error_message' => 'No Kartu Keluarga yang anda masukan salah!'
            ];

            session()->setFlashdata($sessError);

            return redirect()->to('user/tulis_pengajuan');
        }
    }
}

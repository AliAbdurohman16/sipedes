<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;

class PengajuanDikirimController extends BaseController
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
            $pd = $this->pengajuanModel->findAll();

            $data = [
                'pds' => $pd
            ];

            $msg = [
                'data' => view('user/pengajuan/pengajuan_dikirim/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Pengajuan Dikirim'
            ];

            return view('user/pengajuan/pengajuan_dikirim/index', $data);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'pd' => $this->pengajuanModel->find($id),
            ];

            $msg = ['success' => view('user/pengajuan/pengajuan_dikirim/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id');

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'no_kk' => [
                        'label' => 'No Kartu Keluarga',
                        'rules' => 'required|min_length[16]|max_length[16]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'max_length' => '{field} maksimal memiliki panjang {param} karakter'
                        ]
                    ],
                    'nik' => [
                        'label' => 'NIK',
                        'rules' => 'required|min_length[16]|max_length[16]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                            'max_length' => '{field} maksimal memiliki panjang {param} karakter'
                        ]
                    ],
                    'telepon' => [
                        'label' => 'No Telepon',
                        'rules' => 'required|min_length[10]|max_length[13]',
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
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_kk' => $validation->getError('no_kk'),
                        'nik' => $validation->getError('nik'),
                        'telepon' => $validation->getError('telepon'),
                        'jenis' => $validation->getError('jenis'),
                        'keterangan' => $validation->getError('keterangan'),
                    ]
                ];
            } else {
                $no_kk = $this->request->getVar('no_kk');
                $checkNoKK = $this->kartuKeluargaModel->getWhere(['no_kk' => $no_kk])->getRow();

                if ($checkNoKK) {
                    $nik = $this->request->getVar('nik');
                    $checkNik = $this->pendudukModel->getWhere(['nik' => $nik])->getRow();
                    if ($checkNik) {
                        $request = [
                            'no_kk' => $no_kk,
                            'nik' => $nik,
                            'telepon' => $this->request->getVar('telepon'),
                            'jenis' => $this->request->getVar('jenis'),
                            'keterangan' => $this->request->getVar('keterangan'),
                        ];

                        $id = $this->request->getVar('id');

                        $this->pengajuanModel->update($id, $request);

                        $msg = ['success' => 'Pengajuan anda berhasil diubah!'];
                    } else {
                        $msg = ['error_message' => 'NIK yang anda masukan salah!'];
                    }
                } else {
                    $msg = ['error_message' => 'No Kartu Keluarga yang anda masukan salah!'];
                }
            }
            echo json_encode($msg) ;
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'pd' => $this->pengajuanModel->find($id),
            ];

            $msg = ['success' => view('user/pengajuan/pengajuan_dikirim/detail', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost();
            $this->pengajuanModel->delete($id);
            $msg = ['success' => 'Pengajuan anda berhasil dihapus!'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

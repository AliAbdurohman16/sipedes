<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AparatDesaModel;

class AparatDesaController extends BaseController
{
    protected $aparatDesaModel;

    public function __construct()
    {
        $this->aparatDesaModel = new AparatDesaModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $aparat = $this->aparatDesaModel->query("SELECT aparat_desa.*, jabatan.name as jabatan FROM aparat_desa JOIN jabatan ON jabatan.id = aparat_desa.jabatan_id");
            $data = [
                'title' => 'Aparat Desa',
                'aparat_desa' => $aparat->getResult()
            ];

            $msg = [
                'data' => view('admin/aparat/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Aparat Desa'
            ];

            return view('admin/aparat/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/aparat/add')
            ];

            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'name' => [
                    'label' => 'Nama',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenis_kelamin' => [
                    'label' => 'Jenis kelamin',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_lahir' => [
                    'label' => 'Tempat lahir',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'Tanggal lahir',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pendidikan_terakhir' => [
                    'label' => 'Pendidikan terakhir',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_pengangkatan' => [
                    'label' => 'Tanggal pengangkatan',
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'mime_in' => '{field} harus berupa gambar (png, jpg, jpeg)',
                        'is_image' => '{field} harus berupa gambar'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'name' => $validation->getError('name'),
                        'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                        'tempat_lahir' => $validation->getError('tempat_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'jabatan' => $validation->getError('jabatan'),
                        'pendidikan_terakhir' => $validation->getError('pendidikan_terakhir'),
                        'tgl_pengangkatan' => $validation->getError('tgl_pengangkatan'),
                        'foto' => $validation->getError('foto')
                    ]
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

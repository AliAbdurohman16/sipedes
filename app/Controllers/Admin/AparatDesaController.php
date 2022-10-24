<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AparatDesaModel;
use App\Models\JabatanModel;
use App\Models\LogAktivitasModel;
use CodeIgniter\I18n\Time;

class AparatDesaController extends BaseController
{
    protected $aparatDesaModel;
    protected $jabatanModel;

    public function __construct()
    {
        $this->aparatDesaModel = new AparatDesaModel();
        $this->jabatanModel = new JabatanModel();
        $this->logModel = new LogAktivitasModel();
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
            $jabatan = $this->jabatanModel->findAll();

            $data = [
                'jabatan' => $jabatan
            ];

            $msg = [
                'data' => view('admin/aparat/add', $data)
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
                    'rules' => 'max_size[foto,5000]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'max_size' => 'Ukuran foto maksimal 5 mb',
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
            } else {
                $file_foto = $this->request->getFile('foto');

                if ($file_foto->getError() == 4) {
                    $file_name = 'Avatar.png';
                } else {
                    $file_name = $file_foto->getRandomName();
                    $file_foto->move('images/aparat', $file_name);
                }

                $request = [
                    'name' => $this->request->getPost('name'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'jabatan_id' => $this->request->getPost('jabatan'),
                    'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                    'tgl_pengangkatan' => $this->request->getPost('tgl_pengangkatan'),
                    'no_sk' => $this->request->getPost('no_sk'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'foto' => $file_name,
                ];

                $this->aparatDesaModel->save($request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Tambah Data Aparat Desa',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data aparat berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $jabatan = $this->jabatanModel->findAll();
            $row = $this->aparatDesaModel->find($id);

            $data = [
                'id' => $row->id,
                'name' => $row->name,
                'jenis_kelamin' => $row->jenis_kelamin,
                'tempat_lahir' => $row->tempat_lahir,
                'tgl_lahir' => $row->tgl_lahir,
                'jabatan_id' => $row->jabatan_id,
                'pendidikan_terakhir' => $row->pendidikan_terakhir,
                'tgl_pengangkatan' => $row->tgl_pengangkatan,
                'no_sk' => $row->no_sk,
                'no_hp' => $row->no_hp,
                'foto' => $row->foto,
                'jabatan' => $jabatan
            ];

            $msg = ['success' => view('admin/aparat/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
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
                    'rules' => 'max_size[foto,5000]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'max_size' => 'Ukuran foto maksimal 5 mb',
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
            } else {
                $id = $this->request->getVar('id');
                $row = $this->aparatDesaModel->find($id);
                $file_foto = $this->request->getFile('foto');
                $file_foto_lama = $this->request->getVar('foto_lama');

                if ($file_foto->getError() == 4) {
                    $file_name = $file_foto_lama;
                } else {
                    $file_name = $file_foto->getRandomName();
                    $file_foto->move('images/aparat', $file_name);
                    if ($row->foto != 'Avatar.png') {
                        unlink('images/aparat/' . $file_foto_lama);
                    }
                }


                $request = [
                    'name' => $this->request->getPost('name'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'jabatan_id' => $this->request->getPost('jabatan'),
                    'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                    'tgl_pengangkatan' => $this->request->getPost('tgl_pengangkatan'),
                    'no_sk' => $this->request->getPost('no_sk'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'foto' => $file_name,
                ];

                $this->aparatDesaModel->update($id, $request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Edit Data Aparat Desa',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data aparat berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $row = $this->aparatDesaModel->find($id);
            $foto = $row->foto;
            if ($row->foto != 'Avatar.png') {
                unlink('images/aparat/' . $foto);
            }
            $this->aparatDesaModel->delete($id);

            // Log Activitya
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data Aparat Desa',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            $msg = ['success' => 'Data aparat berhasil di hapus'];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $query = $this->aparatDesaModel->query("SELECT aparat_desa.*, jabatan.name as jabatan FROM aparat_desa JOIN jabatan ON jabatan.id = aparat_desa.jabatan_id WHERE aparat_desa.id = '$id'");

            $data = [
                'aparat' => $query->getResult()
            ];

            $msg = [
                'data' => view('admin/aparat/detail', $data)
            ];

            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

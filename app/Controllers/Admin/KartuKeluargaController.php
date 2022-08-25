<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnggotaPendudukModel;
use App\Models\KartuKeluargaModel;
use App\Models\PendudukModel;
use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\LogActivityModel;
use CodeIgniter\I18n\Time;

class KartuKeluargaController extends BaseController
{
    protected $kartuKeluargaModel;
    protected $pendudukModel;
    protected $anggotaPendudukModel;
    protected $rtModel;
    protected $rwModel;

    public function __construct()
    {
        $this->kartuKeluargaModel = new KartuKeluargaModel();
        $this->pendudukModel = new PendudukModel();
        $this->anggotaPendudukModel = new AnggotaPendudukModel();
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
        $this->logModel = new LogActivityModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $kartuKeluarga = $this->kartuKeluargaModel->findAll();
            $data = [
                'title' => 'Data Kartu Keluarga',
                'kartu_keluarga' => $kartuKeluarga
            ];

            $msg = [
                'data' => view('admin/data-master/KartuKeluarga/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Kartu Keluarga'
            ];

            return view('admin/data-master/KartuKeluarga/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'rts' => $this->rtModel->findAll(),
                'rws' => $this->rwModel->findAll(),
            ];

            $msg = [
                'data' => view('admin/data-master/KartuKeluarga/add', $data)
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
            $valid = $this->validate(
                [
                    'no_kk' => [
                        'label' => 'Nomor kartu keluarga',
                        'rules' => 'required|is_unique[kartu_keluarga.no_kk]|numeric|max_length[16]|min_length[16]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah tersedia',
                            'numeric' => '{field} harus berupa angka',
                            'max_length' => '{field} maksimal 16 angka',
                            'min_length' => '{field} minimal 16 angka',
                        ]
                    ],
                    'nama_kepala' => [
                        'label' => 'Nama kepala keluarga',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'provinsi' => [
                        'label' => 'Provinsi',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kabupaten' => [
                        'label' => 'Kabupaten',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kecamatan' => [
                        'label' => 'Kecamatan',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kelurahan' => [
                        'label' => 'Kelurahan',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'rw' => [
                        'label' => 'RW',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'rt' => [
                        'label' => 'RT',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'alamat' => [
                        'label' => 'Alamat',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_kk' => $validation->getError('no_kk'),
                        'nama_kepala' => $validation->getError('nama_kepala'),
                        'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                        'provinsi' => $validation->getError('provinsi'),
                        'kabupaten' => $validation->getError('kabupaten'),
                        'kecamatan' => $validation->getError('kecamatan'),
                        'kelurahan' => $validation->getError('kelurahan'),
                        'rw' => $validation->getError('rw'),
                        'rt' => $validation->getError('rt'),
                        'alamat' => $validation->getError('alamat'),
                    ]
                ];
            } else {
                $request = [
                    'no_kk' => $this->request->getPost('no_kk'),
                    'nama_kepala' => $this->request->getPost('nama_kepala'),
                    'rt_id' => $this->request->getPost('rt'),
                    'rw_id' => $this->request->getPost('rw'),
                    'kelurahan' => $this->request->getPost('kelurahan'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kabupaten' => $this->request->getPost('kabupaten'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'alamat' => $this->request->getPost('alamat'),
                ];

                $this->kartuKeluargaModel->save($request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Tambah Data Kartu Keluarga',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data penduduk berhasil di simpan'];
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

            $row = $this->kartuKeluargaModel->find($id);

            $data = [
                'rts' => $this->rtModel->findAll(),
                'rws' => $this->rwModel->findAll(),
                'id' => $row->id,
                'no_kk' => $row->no_kk,
                'nama_kepala' => $row->nama_kepala,
                'rt_id' => $row->rt_id,
                'rw_id' => $row->rw_id,
                'kelurahan' => $row->kelurahan,
                'kecamatan' => $row->kecamatan,
                'kabupaten' => $row->kabupaten,
                'provinsi' => $row->provinsi,
                'alamat' => $row->alamat,
            ];

            $msg = ['success' => view('admin/data-master/KartuKeluarga/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $kkOld = $this->kartuKeluargaModel->find($id);

            if ($kkOld->no_kk == $this->request->getVar('no_kk')) {
                $rules_kk = 'required|numeric|max_length[16]';
            } else {
                $rules_kk = 'required|is_unique[kartu_keluarga.no_kk]|numeric|max_length[16]';
            }

            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'no_kk' => [
                        'label' => 'Nomor kartu keluarga',
                        'rules' => $rules_kk,
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah tersedia',
                            'numeric' => '{field} harus berupa angka',
                            'max_length' => '{field} maksimal 16 angka',
                        ]
                    ],
                    'nama_kepala' => [
                        'label' => 'Nama kepala keluarga',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'provinsi' => [
                        'label' => 'Provinsi',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kabupaten' => [
                        'label' => 'Kabupaten',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kecamatan' => [
                        'label' => 'Kecamatan',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'kelurahan' => [
                        'label' => 'Kelurahan',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'rw' => [
                        'label' => 'RW',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'rt' => [
                        'label' => 'RT',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'alamat' => [
                        'label' => 'Alamat',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'no_kk' => $validation->getError('no_kk'),
                        'nama_kepala' => $validation->getError('nama_kepala'),
                        'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                        'provinsi' => $validation->getError('provinsi'),
                        'kabupaten' => $validation->getError('kabupaten'),
                        'kecamatan' => $validation->getError('kecamatan'),
                        'kelurahan' => $validation->getError('kelurahan'),
                        'rw' => $validation->getError('rw'),
                        'rt' => $validation->getError('rt'),
                        'alamat' => $validation->getError('alamat'),
                    ]
                ];
            } else {
                $request = [
                    'no_kk' => $this->request->getPost('no_kk'),
                    'nama_kepala' => $this->request->getPost('nama_kepala'),
                    'rt_id' => $this->request->getPost('rt'),
                    'rw_id' => $this->request->getPost('rw'),
                    'kelurahan' => $this->request->getPost('kelurahan'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kabupaten' => $this->request->getPost('kabupaten'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'alamat' => $this->request->getPost('alamat'),
                ];

                $this->kartuKeluargaModel->update($id, $request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Edit Data Kartu Keluarga',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data penduduk berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost();
            $this->kartuKeluargaModel->delete($id);
            // Log Activity
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data Kartu Keluarga',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            $msg = ['success' => 'Data penduduk berhasil di hapus'];
            echo json_encode($msg);
        } else {
            exit("Maaf data tidak dapat di proses");
        }
    }

    public function anggota_kk()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $row = $this->kartuKeluargaModel->find($id);

            $query = $this->anggotaPendudukModel->query("SELECT anggota_penduduk.*, penduduk.nik, penduduk.name, penduduk.jenis_kelamin FROM `anggota_penduduk` JOIN penduduk ON anggota_penduduk.penduduk_id = penduduk.id WHERE anggota_penduduk.kk_id = '$id'");

            $data = [
                'penduduks' => $this->pendudukModel->findAll(),
                'anggota_penduduk' => $query->getResult(),
                'id' => $row->id,
                'no_kk' => $row->no_kk,
                'nama_kepala' => $row->nama_kepala,
                'rt_id' => $row->rt_id,
                'rw_id' => $row->rw_id,
                'kelurahan' => $row->kelurahan,
                'kecamatan' => $row->kecamatan,
                'kabupaten' => $row->kabupaten,
                'provinsi' => $row->provinsi,
                'alamat' => $row->alamat,
            ];

            $msg = ['data' => view('admin/data-master/KartuKeluarga/anggota_kk', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function create_anggota()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'penduduk' => [
                        'label' => 'Penduduk',
                        'rules' => 'required|is_unique[anggota_penduduk.penduduk_id]|',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah tersedia',
                        ]
                    ],
                    'status_hubungan' => [
                        'label' => 'Hubungan keluarga',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'penduduk' => $validation->getError('penduduk'),
                        'status_hubungan' => $validation->getError('status_hubungan'),
                    ]
                ];
            } else {
                $request = [
                    'kk_id' => $this->request->getPost('kk_id'),
                    'penduduk_id' => $this->request->getPost('penduduk'),
                    'status_hubungan' => $this->request->getPost('status_hubungan'),
                ];

                $this->anggotaPendudukModel->save($request);

                // Log Activity
                $params = [
                    'user_id'       => session()->get('user')->id,
                    'activities'    => 'Tambah Data Anggota Kartu Keluarga',
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                ];

                $this->logModel->insert($params);

                $msg = ['success' => 'Data penduduk berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete_anggota()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost();
            $this->anggotaPendudukModel->delete($id);
            $msg = ['success' => 'Data penduduk berhasil di hapus'];
            // Log Activity
            $params = [
                'user_id'       => session()->get('user')->id,
                'activities'    => 'Hapus Data Anggota Kartu Keluarga',
                'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->logModel->insert($params);
            echo json_encode($msg);
        } else {
            exit("Maaf data tidak dapat di proses");
        }
    }
}

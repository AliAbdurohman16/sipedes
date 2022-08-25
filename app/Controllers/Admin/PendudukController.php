<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\RtModel;
use App\Models\RwModel;

class PendudukController extends BaseController
{

    protected $pendudukModel;
    protected $rtModel;
    protected $rwModel;

    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $query = $this->pendudukModel->query("SELECT penduduk.*, anggota_penduduk.kk_id, anggota_penduduk.penduduk_id, kartu_keluarga.no_kk, kartu_keluarga.nama_kepala FROM `penduduk` LEFT JOIN anggota_penduduk ON anggota_penduduk.penduduk_id = penduduk.id LEFT JOIN kartu_keluarga ON anggota_penduduk.kk_id = kartu_keluarga.id WHERE penduduk.status = 'ada'");
            $data = [
                'title' => 'Data Penduduk',
                'penduduks' => $query->getResult()
            ];

            $msg = [
                'data' => view('admin/penduduk/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Penduduk'
            ];

            return view('admin/penduduk/index', $data);
        }
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'rts' => $this->rtModel->findAll(),
                'rws' => $this->rwModel->findAll()
            ];

            $msg = [
                'data' => view('admin/penduduk/add', $data)
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
                    'nik' => [
                        'label' => 'Nomor induk kependudukan',
                        'rules' => 'required|is_unique[penduduk.nik]|numeric|max_length[16]',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah tersedia',
                            'numeric' => '{field} harus berupa angka',
                            'max_length' => '{field} maksimal 16 angka',
                        ]
                    ],
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
                    'gol_darah' => [
                        'label' => 'Golongan darah',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'agama' => [
                        'label' => 'Agama',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'status_kawin' => [
                        'label' => 'Status kawin',
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
                    'pekerjaan' => [
                        'label' => 'Pekerjaan',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'nama_ayah' => [
                        'label' => 'Nama ayah',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'nama_ibu' => [
                        'label' => 'Nama ibu',
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
                        'nik' => $validation->getError('nik'),
                        'name' => $validation->getError('name'),
                        'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                        'tempat_lahir' => $validation->getError('tempat_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'provinsi' => $validation->getError('provinsi'),
                        'kabupaten' => $validation->getError('kabupaten'),
                        'kecamatan' => $validation->getError('kecamatan'),
                        'kelurahan' => $validation->getError('kelurahan'),
                        'rw' => $validation->getError('rw'),
                        'rt' => $validation->getError('rt'),
                        'alamat' => $validation->getError('alamat'),
                        'gol_darah' => $validation->getError('gol_darah'),
                        'agama' => $validation->getError('agama'),
                        'status_kawin' => $validation->getError('status_kawin'),
                        'pendidikan_terakhir' => $validation->getError('pendidikan_terakhir'),
                        'pekerjaan' => $validation->getError('pekerjaan'),
                        'nama_ayah' => $validation->getError('nama_ayah'),
                        'nama_ibu' => $validation->getError('nama_ibu'),
                    ]
                ];
            } else {
                $request = [
                    'nik' => $this->request->getPost('nik'),
                    'name' => $this->request->getPost('name'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'rt_id' => $this->request->getPost('rt'),
                    'rw_id' => $this->request->getPost('rw'),
                    'kelurahan' => $this->request->getPost('kelurahan'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kabupaten' => $this->request->getPost('kabupaten'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'alamat' => $this->request->getPost('alamat'),
                    'gol_darah' => $this->request->getPost('gol_darah'),
                    'agama' => $this->request->getPost('agama'),
                    'status_kawin' => $this->request->getPost('status_kawin'),
                    'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'status' => 'ada',
                ];

                $this->pendudukModel->save($request);
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

            $row = $this->pendudukModel->find($id);

            $data = [
                'rts' => $this->rtModel->findAll(),
                'rws' => $this->rwModel->findAll(),
                'id' => $row->id,
                'nik' => $row->nik,
                'name' => $row->name,
                'jenis_kelamin' => $row->jenis_kelamin,
                'tempat_lahir' => $row->tempat_lahir,
                'tgl_lahir' => $row->tgl_lahir,
                'rt_id' => $row->rt_id,
                'rw_id' => $row->rw_id,
                'kelurahan' => $row->kelurahan,
                'kecamatan' => $row->kecamatan,
                'kabupaten' => $row->kabupaten,
                'provinsi' => $row->provinsi,
                'alamat' => $row->alamat,
                'gol_darah' => $row->gol_darah,
                'agama' => $row->agama,
                'status_kawin' => $row->status_kawin,
                'pendidikan_terakhir' => $row->pendidikan_terakhir,
                'pekerjaan' => $row->pekerjaan,
                'nama_ibu' => $row->nama_ibu,
                'nama_ayah' => $row->nama_ayah,
            ];

            $msg = ['success' => view('admin/penduduk/edit', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $nikOld = $this->pendudukModel->find($id);

        if ($nikOld->nik == $this->request->getVar('nik')) {
            $rules_nik = 'required|numeric|max_length[16]';
        } else {
            $rules_nik = 'required|is_unique[penduduk.nik]|numeric|max_length[16]';
        }

        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'nik' => [
                        'label' => 'Nomor induk kependudukan',
                        'rules' => $rules_nik,
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah tersedia',
                            'numeric' => '{field} harus berupa angka',
                            'max_length' => '{field} maksimal 16 angka',
                        ]
                    ],
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
                    'gol_darah' => [
                        'label' => 'Golongan darah',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'agama' => [
                        'label' => 'Agama',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'status_kawin' => [
                        'label' => 'Status kawin',
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
                    'pekerjaan' => [
                        'label' => 'Pekerjaan',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'nama_ayah' => [
                        'label' => 'Nama ayah',
                        'rules' => 'required|string',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'nama_ibu' => [
                        'label' => 'Nama ibu',
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
                        'nik' => $validation->getError('nik'),
                        'name' => $validation->getError('name'),
                        'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                        'tempat_lahir' => $validation->getError('tempat_lahir'),
                        'tgl_lahir' => $validation->getError('tgl_lahir'),
                        'provinsi' => $validation->getError('provinsi'),
                        'kabupaten' => $validation->getError('kabupaten'),
                        'kecamatan' => $validation->getError('kecamatan'),
                        'kelurahan' => $validation->getError('kelurahan'),
                        'rw' => $validation->getError('rw'),
                        'rt' => $validation->getError('rt'),
                        'alamat' => $validation->getError('alamat'),
                        'gol_darah' => $validation->getError('gol_darah'),
                        'agama' => $validation->getError('agama'),
                        'status_kawin' => $validation->getError('status_kawin'),
                        'pendidikan_terakhir' => $validation->getError('pendidikan_terakhir'),
                        'pekerjaan' => $validation->getError('pekerjaan'),
                        'nama_ayah' => $validation->getError('nama_ayah'),
                        'nama_ibu' => $validation->getError('nama_ibu'),
                    ]
                ];
            } else {
                $request = [
                    'nik' => $this->request->getPost('nik'),
                    'name' => $this->request->getPost('name'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'rt_id' => $this->request->getPost('rt'),
                    'rw_id' => $this->request->getPost('rw'),
                    'kelurahan' => $this->request->getPost('kelurahan'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kabupaten' => $this->request->getPost('kabupaten'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'alamat' => $this->request->getPost('alamat'),
                    'gol_darah' => $this->request->getPost('gol_darah'),
                    'agama' => $this->request->getPost('agama'),
                    'status_kawin' => $this->request->getPost('status_kawin'),
                    'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                ];
                $id = $this->request->getVar('id');

                $this->pendudukModel->update($id, $request);
                $msg = ['success' => 'Data penduduk berhasil di simpan'];
            }
            echo json_encode($msg);
        } else {
            exit("Maaf data tidak dapat di proses");
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost();
            $this->pendudukModel->delete($id);
            $msg = ['success' => 'Data penduduk berhasil di hapus'];
            echo json_encode($msg);
        } else {
            exit("Maaf data tidak dapat di proses");
        }
    }

    public function detail()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $query = $this->pendudukModel->query("SELECT penduduk.*, rt.name as rt_name, rt.number as rt_number, rw.name as rw_name, rw.number as rw_number FROM penduduk JOIN rt ON rt.id = penduduk.rt_id JOIN rw ON rw.id = penduduk.rw_id WHERE penduduk.id = '$id'");

            $data = [
                'penduduk' => $query->getResult()
            ];

            $msg = [
                'data' => view('admin/penduduk/detail', $data)
            ];

            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

<?php

namespace App\Controllers\Admin\Pengajuan;

// require_once '../vendor/autoload.php';

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;
use App\Models\LogAktivitasModel;
use CodeIgniter\I18n\Time;
// use Twilio\Rest\Client;

class MasukController extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->pengajuanModel = new PengajuanModel();
        $this->pendudukModel = new PendudukModel();
        $this->kartuKeluargaModel = new KartuKeluargaModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $pd = $this->pengajuanModel->where('status', 'Belum Dibuat')->orderBy('created_at','DESC')->get()->getResult();

            $data = [
                'pds' => $pd
            ];

            $msg = [
                'data' => view('admin/pengajuan/pengajuan_masuk/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Pengajuan Masuk'
            ];

            return view('admin/pengajuan/pengajuan_masuk/index', $data);
        }
    }

    public function validasi()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'pd' => $this->pengajuanModel->find($id),
            ];

            $msg = ['success' => view('admin/pengajuan/pengajuan_masuk/validasi', $data)];
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
                    'file' => [
                        'label' => 'Upload File Surat',
                        'rules' => 'max_size[file,5000]|mime_in[file,application/pdf]',
                        'errors' => [
                            'max_size' => 'Ukuran file maksimal 5 mb',
                            'mime_in' => '{field} harus berupa file (pdf)',
                        ]
                    ],
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'file' => $validation->getError('file'),
                    ]
                ];
            } else {
                $telepon = $this->request->getVar('telepon');

                // Send Whatsapp with twilio
                // $sid    = "AC8864285d5382d0192ce5c1150dd96adb";
                // $token  = "50d5a415e25d039d571128b3b35e547c";
                // $twilio = new Client($sid, $token);

                // $twilio->messages->create(
                //     "whatsapp:+$telepon", // to 
                //     array(
                //         "from" => "whatsapp:+14155238886",
                //         "body" => $informasi
                //     )
                // );

                $file_surat = $this->request->getFile('file');

                if ($file_surat->getError() == 4) {
                    $msg = ['error' => 'Terdapat kesalahan pada file!'];

                    echo json_encode($msg);
                } else {
                    $file_name = $file_surat->getRandomName();
                    $file_surat->move('document/surat/', $file_name);

                    $request = [
                        'file'      => $file_name,
                        'status'    => 'Sudah Dibuat',
                        'updated_at'=> Time::now('Asia/Jakarta', 'en_ID')
                    ];

                    $id = $this->request->getVar('id');

                    $this->pengajuanModel->update($id, $request);

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://whatsapp.fikriks.com/send-message',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('document/surat/'.$file_name),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/x-www-form-urlencoded'
                    ),
                    ));
    
                    $response = curl_exec($curl);
    
                    curl_close($curl);

                    // Log Activity
                    $params = [
                        'user_id'       => session()->get('user')->id,
                        'activities'    => 'Validasi Data Pengajuan',
                        'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
                    ];

                    $this->logModel->insert($params);
                    
                    $msg = ['success' => 'Validasi berhasil dikirim!'];
                }
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $row = $this->pengajuanModel->find($id);
            $pddk = $this->pendudukModel->select('rt.number as no_rt, rw.number as no_rw, dusun.name as dusun, penduduk.*')
                ->join('rt', 'rt.id = penduduk.rt_id')
                ->join('rw', 'rw.id = penduduk.rw_id')
                ->join('dusun', 'dusun.id = penduduk.dusun_id')
                ->getWhere(['nik' => $row->nik])->getRow();

            $data = [
                'pd'    => $row,
                'kk'    => $this->kartuKeluargaModel->getWhere(['no_kk' => $row->no_kk])->getRow(),
                'pddk'  => $pddk,
            ];

            $msg = ['success' => view('admin/pengajuan/pengajuan_masuk/detail', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detailNotification()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'pd' => $this->pengajuanModel->find($id),
            ];

            $param = [
                'read_admin' => 'yes'
            ];

            $this->pengajuanModel->update($id, $param);

            $msg = ['success' => view('admin/pengajuan/pengajuan_masuk/detailNotif', $data)];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

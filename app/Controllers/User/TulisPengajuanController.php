<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\PendudukModel;
use App\Models\KartuKeluargaModel;
use CodeIgniter\I18n\Time;

use Dompdf\Dompdf;
use Dompdf\Options;

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
        $filename = time().'-'.session()->get('penduduk')->nik.'-'.rand(0,100).'.pdf';

        $dompdf = new Dompdf();

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
            // 'keterangan' => [
            //     'label' => 'Keterangan',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} tidak boleh kosong.',
            //     ]
            // ],
        ])) {
            return redirect()->to('user/tulis_pengajuan')->withInput();
        }

        $nik = session()->get('penduduk')->nik;
        $checkNik = $this->pendudukModel->getWhere(['nik' => $nik])->getRow();
        $jenis = $this->request->getVar('jenis');
        $telepon = $this->request->getVar('telepon');

        if($jenis == "Keterangan Penghasilan"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([
                    'sebagai' => $this->request->getVar('sebagai'),
                    'gaji' => $this->request->getVar('gaji')
                ]),
                'file' => $filename,
                'status' => 'Sudah Dibuat',
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);

            $latest = $this->pengajuanModel->orderBy('id', 'desc')
                        ->first();
    
            $dompdf->loadHtml(view('template/surat/ket_penghasilan', ['data' => $latest]));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        } else if($jenis == "Keterangan Belum Nikah"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'status' => 'Sudah Dibuat',
                'file' => $filename,
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);
    
            $dompdf->loadHtml(view('template/surat/ket_belum_nikah'));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        } else if($jenis == "Keterangan Belum Bekerja"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'status' => 'Sudah Dibuat',
                'file' => $filename,
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);
    
            $dompdf->loadHtml(view('template/surat/ket_belum_bekerja'));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        }else if($jenis == "Keterangan Domisili"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'status' => 'Sudah Dibuat',
                'file' => $filename,
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);
    
            $dompdf->loadHtml(view('template/surat/ket_domisili'));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        } else if($jenis == "Keterangan Miskin"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'status' => 'Sudah Dibuat',
                'file' => $filename,
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);
    
            $dompdf->loadHtml(view('template/surat/ket_miskin'));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        } else if($jenis == "Keterangan SKTM"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'status' => 'Sudah Dibuat',
                'file' => $filename,
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);
    
            $dompdf->loadHtml(view('template/surat/ket_sktm'));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        } else if($jenis == "Keterangan SKCK"){
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'status' => 'Sudah Dibuat',
                'file' => $filename,
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);
    
            $dompdf->loadHtml(view('template/surat/ket_skck'));
    
            $dompdf->setPaper('A4', 'portrait');
    
            $dompdf->render();
    
            $output = $dompdf->output();
            file_put_contents('dokumen/surat/'.$filename, $output);

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
            CURLOPT_POSTFIELDS => 'number='.$telepon.'&message='. site_url('dokumen/surat/'.$filename),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! silahkan tekan tombol unduh'
            ];
    
            session()->setFlashdata($sessSuccess);
    
            return redirect()->to('user/pengajuan_sudah_dibuat');
        }else{
            $result = [
                'no_kk' => session()->get('penduduk')->no_kk,
                'nik' => $nik,
                'nama' => $checkNik->name,
                'telepon' => $this->request->getVar('telepon'),
                'jenis' => $this->request->getVar('jenis'),
                'keterangan' => json_encode([]),
                'created_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];

            $this->pengajuanModel->insert($result);

            $sessSuccess = [
                'success_message' => 'Pengajuan anda berhasil dibuat! Silahkan tunggu notifikasi melalui whatsapp apabila surat telah kami buat!'
            ];
    
            session()->setFlashdata($sessSuccess);

            return redirect()->to('user/pengajuan_dikirim');
        }
    }

    public function surat()
    {
        $filename = time().'-'.session()->get('penduduk')->nik.'-'.rand(0,100).'.pdf';

        $dompdf = new Dompdf();

        $dompdf->loadHtml(view('template/surat/ket_skck'));

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        return $dompdf->stream($filename);
    }
}

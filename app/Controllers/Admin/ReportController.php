<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;
use App\Models\LogActivityModel;
use CodeIgniter\I18n\Time;

class ReportController extends BaseController
{
    public function __construct(){
        $this->pengajuanModel = new PengajuanModel();
        $this->logModel = new LogActivityModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan'
        ];

        return view('admin/report/index', $data);
    }

    public function print()
    {
        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');

        $report = $this->pengajuanModel->report($start, $end);

        $data = [
            'title'     => 'Print Laporan',
            'report'    => $report,
            'start'     => $start,
            'end'       => $end,
        ];

        // Log Activity
        $params = [
            'user_id'       => session()->get('user')->id,
            'activities'    => 'Lihat Data Laporan',
            'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->logModel->insert($params);

        return view('admin/report/print', $data);
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;

class ReportController extends BaseController
{
    public function __construct(){
        $this->pengajuanModel = new PengajuanModel();
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

        return view('admin/report/print', $data);
    }
}

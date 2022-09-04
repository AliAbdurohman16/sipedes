<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;

class LogAktivitasController extends BaseController
{
    public function __construct()
    {
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $logs = $this->logModel->withUser();

            $data = [
                'logs' => $logs
            ];

            $msg = [
                'data' => view('admin/log-aktivitas/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Log Aktivitas'
            ];
    
            return view('admin/log-aktivitas/index', $data);
        }
    }
}

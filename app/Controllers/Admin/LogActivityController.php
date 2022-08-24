<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;

class LogActivityController extends BaseController
{
    public function __construct()
    {
        $this->logModel = new LogActivityModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $logs = $this->logModel->withUser();

            $data = [
                'logs' => $logs
            ];

            $msg = [
                'data' => view('admin/logActivity/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Log Activity'
            ];
    
            return view('admin/logActivity/index', $data);
        }
    }
}

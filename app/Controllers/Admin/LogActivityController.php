<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LogActivityController extends BaseController
{
    public function index()
    {
        if ($this->request->isAJAX()) {
            $rts = $this->rtModel->withRw();

            $data = [
                'rts' => $rts
            ];

            $msg = [
                'data' => view('admin/logActivity/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Rukun Tetangga (RT)'
            ];
    
            return view('admin/logActivity/index', $data);
        }
    }
}

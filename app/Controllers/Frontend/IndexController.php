<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

use App\Models\AparatDesaModel;

class IndexController extends BaseController
{
    public function __construct()
    {
        $this->aparatModel = new AparatDesaModel();
    }

    public function index()
    {
        $data = [
            'aparat' => $this->aparatModel->withJabatan()
        ];

        return view('frontend/index', $data);
    }
}

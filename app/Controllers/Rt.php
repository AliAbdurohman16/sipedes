<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\RtModel;

class Rt extends BaseController
{
    public function __construct()
    {
        $this->rtModel = new RtModel();
    }

    public function index()
    {
        $rts = $this->rtModel->withRw();

        $data = [
            'title' => 'RT',
            'rts' => $rts
        ];

        return view('Rt/index', $data);
    }


    public function save()
    {
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KartuKeluargaModel;
use App\Models\RtModel;
use App\Models\RwModel;

class KartuKeluargaController extends BaseController
{
    protected $kartuKeluargaModel;
    protected $rtModel;
    protected $rwModel;

    public function __construct()
    {
        $this->kartuKeluargaModel = new KartuKeluargaModel();
        $this->rtModel = new RtModel();
        $this->rwModel = new RwModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $kartuKeluarga = $this->kartuKeluargaModel->findAll();
            $data = [
                'title' => 'Data Kartu Keluarga',
                'kartu_keluarga' => $kartuKeluarga
            ];

            $msg = [
                'data' => view('admin/data-master/KartuKeluarga/table', $data)
            ];

            echo json_encode($msg);
        } else {
            $data = [
                'title' => 'Data Kartu Keluarga'
            ];

            return view('admin/data-master/KartuKeluarga/index', $data);
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
                'data' => view('admin/data-master/KartuKeluarga/add', $data)
            ];

            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}

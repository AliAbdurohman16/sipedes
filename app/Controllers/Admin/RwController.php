<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\DusunModel;

class RwController extends ResourceController
{
    protected $modelName = 'App\Models\RwModel';

    public function __construct()
    {
        $this->Dusun = new DusunModel;
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'title' => 'Data Rukun Warga (RW)',
            'rws' => $this->model->withDusun(),
            'dusun' => $this->Dusun->findAll()
        ];

        return view('admin/data-master/rw/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if(!$this->validate([
            'name' => 'required|min_length[3]|string',
            'number' => 'required|integer',
            'dusun_id' => 'required|integer'
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'dusun_id' => $this->request->getPost('dusun_id')
        ];

        $result = $this->model->save($request);

        if($result){
            session()->setFlashdata('message', 'Tambah Data RW Berhasil');
        }else{
            session()->setFlashdata('error', 'Tambah Data RW Tidak Berhasil');
        }

        return redirect()->to('admin/data_rw');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if(!$this->validate([
            'name' => 'required|min_length[3]|string',
            'number' => 'required|integer',
            'dusun_id' => 'required|integer'
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'name' => $this->request->getPost('name'),
            'number' => $this->request->getPost('number'),
            'dusun_id' => $this->request->getPost('dusun_id')
        ];

        $result = $this->model->update($id, $request);

        if($result){
            session()->setFlashdata('message', 'Edit Data RW Berhasil');
        }else{
            session()->setFlashdata('error', 'Edit Data RW Tidak Berhasil');
        }

        return redirect()->to('admin/data_rw');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->model->delete($id);

        if($result){
            session()->setFlashdata('message', 'Hapus Data RW Berhasil');
        }else{
            session()->setFlashdata('error', 'Hapus Data RW Tidak Berhasil');
        }

        return redirect()->to('admin/data_rw');
    }
}

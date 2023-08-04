<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\khsmodel;

class khs extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new khsmodel();
        $this->menu = [
            'beranda'=>[
                'title' =>'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=> '',
            ],
            'nama mahasiswa'=>[
                'title' =>'nama mahasiswa',
                'link' => base_url() . '/nama mahasiswa',
                'icon' => 'fa-solid fa-building-columns',
                'aktif'=> 'active',
            ],
            'khs'=>[
                'title' =>'khs',
                'link' => base_url() . '/khs',
                'icon' => 'fa-solid fa-list',
                'aktif'=> '',
            ],
            'mata kuliah'=>[
                'title' =>'mata kuliah',
                'link' => base_url() . '/mata kuliah',
                'icon' => 'fa-solid fa-users',
                'aktif'=> '',
            ],
        ];
        $this->rules = [
            'uts' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'uts tidak boleh kosong.',
                ]
            ],
            'uas' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'uas tidak boleh kosong.',
                ]
            ],
            'nilai' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'nilai tidak boleh kosong.',
                ]
            ],
            'IPK' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'IPK tidak boleh kosong.',
                ]
            ],
        ];
    }
    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
     <h1 class="m-0">khs</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="'.base_url() .'">Beranda</a></li>
          <li class="breadcrumb-item active">khs</li>
        </ol>
      </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Data NMP';

        $query = $this->pm->find();
        $data['data_khs'] =$query;
        return view('khs/content', $data);
    }

    public function tambah() 
    {
        $breadcrumb = '<div class="col-sm-6">
        <h1 class="m-0">khs</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="'.base_url() . '">Beranda</a></li>
             <li class="breadcrumb-item"><a href="'.base_url().'/khs">khs</a></li>
             <li class="breadcrumb-item active">Tambah khs</li>
           </ol>
         </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Tambah khs';
        $data['action'] = base_url() . '/khs/simpan';
        return view('khs/input', $data);
    }
    public function simpan()
    {
       
        if (strtolower($this->request->getMethod()) !== 'post') {
           
            return redirect()->back()->withinput();
        }
        if (! $this->validate($this->rules)) {
          return redirect()->back()->withinput();
        }

        
        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('khs')->with('success','Data berhasil disimpan');
        } catch (\Codeigniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withinput();
        }
    }

    public function hapus($id) 
    {
        if(empty($id)){
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan');
        }
        try {
            $this->pm->delete($id);
            return redirect()->to('khs')->with('success', 'Data khs dengan kode' .$id. 'berhasil dihapus');
        } catch (\Codeigniter\Database\Exceptions\DatabaseException $e) {
            return redirect()-to('khs')->with('error',$e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">khs</h1>
                        </div>
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="'.base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="'.base_url().'/khs">khs</a></li>
                            <li class="breadcrumb-item active">Edit khs</li>
                        </ol>
                    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Edit khs';
        $data['action'] = base_url() . '/khs/update';

        $data['edit_data'] =$this->pm->find($id);
        return view('khs/input', $data);
    }
    public function update(){
       $dtEdit = $this->request->getPost();
       $param = $dtEdit['param'];
       unset($dtEdit['param']);
       unset($this->rules['password']);
       if (! $this->validate($this->rules)) {

        return redirect()->back()->withinput();
      }
      if (empty($dtEdit['password'])){
        unset($dtEdit['password']);
      }
      try {
        $this->pm->update($param, $dtEdit);
        return redirect()->to('khs')->with('success', 'Data berhasil di update');
      } catch (\Codeigniter\Database\Exceptions\DatabaseException $e) {
        session()->setFlashdata('error', $e->getMessage());
        return redirect()->back()->withinput();
      }
    }
}

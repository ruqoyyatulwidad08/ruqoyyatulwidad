<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\khsModel;

class nama extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new khsModel();
        $this->menu = [
            'beranda'=>[
                'title' =>'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=> '',
            ],
            'uts'=>[
                'title' =>'uts',
                'link' => base_url() . '/uts',
                'icon' => 'fa-solid fa-building-columns',
                'aktif'=> '',
            ],
            'uas'=>[
                'title' =>'uas',
                'link' => base_url() . '/uas',
                'icon' => 'fa-solid fa-list',
                'aktif'=> 'active',
            ],
            'nilai'=>[
                'title' =>'nilai',
                'link' => base_url() . '/nilai',
                'icon' => 'fa-solid fa-users',
                'aktif'=> '',
            ],
            'IPK'=>[
                'title' =>'IPK',
                'link' => base_url() . '/IPK',
                'icon' => 'fa-solid fa-users',
                'aktif'=> '',
            ],
        ];
        $this->rules = [
            'NIM' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'NIM tidak boleh kosong.',
                ]
            ],
            'nama' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'nama tidak boleh kosong.',
                ]
            ],
            'TTL' =>[
                'rules'=>'required',
                'errors'=>[
                    'required' => 'TTL tidak boleh kosong.',
                ]
            ],
            'JK' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'JK tidak boleh kosong.',
                ]
            ],
        ];
    }
    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
     <h1 class="m-0">KHS</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="'.base_url() .'">Beranda</a></li>
          <li class="breadcrumb-item active">KHS</li>
        </ol>
      </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Data KHS';

        $query = $this->pm->find();
        $dd['data_KHS'] =$query;
        return view('KHS/content', $data);
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
            return redirect()->to('khs')->with('success', 'Data khs ' . 'berhasil dihapus');
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

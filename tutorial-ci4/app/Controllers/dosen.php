<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new DosenModel();
        $this->menu = [
            'beranda'=>[
                'title' =>'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=> 'active',
            ],
            'dosen'=>[
                'title' =>'Dosen',
                'link' => base_url() . '/dosen',
                'icon' => 'fa-solid fa-building-columns',
                'aktif'=> '',
            ],
            'khs'=>[
                'title' =>'KHS',
                'link' => base_url() . '/khs',
                'icon' => 'fa-solid fa-list',
                'aktif'=> '',
            ],
            'mahasiswa'=>[
                'title' =>'mahasiswa',
                'link' => base_url() . '/mahasiswa',
                'icon' => 'fa-solid fa-users',
                'aktif'=> '',
            ],
        ];
        $this->rules = [
            'kode' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'kode tidak boleh kosong.',
                ]
            ],
            'nama' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'nama kelas tidak boleh kosong.',
                ]
            ],
            'matkul' =>[
                'rules'=>'required',
                'errors'=>[
                    'required' => 'matkul tidak boleh kosong.',
                ]
            ],
            'SKS' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'SKS tidak boleh kosong.',
                ]
            ],
            'kelas' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'kelas tidak boleh kosong.',
                ]
            ],
        ];
    }
    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
     <h1 class="m-0">Dosen</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="'.base_url() .'">Beranda</a></li>
          <li class="breadcrumb-item active">Dosen</li>
        </ol>
      </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Data matkul';

        $query = $this->pm->find();
        $data['data_dosen'] =$query;
        return view('dosen/content', $data);
    }

    public function tambah() 
    {
        $breadcrumb = '<div class="col-sm-6">
        <h1 class="m-0">Dosen</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="'.base_url() . '">Beranda</a></li>
             <li class="breadcrumb-item"><a href="'.base_url().'/dosen">Dosen</a></li>
             <li class="breadcrumb-item active">Tambah Dosen</li>
           </ol>
         </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Tambah Dosen';
        $data['action'] = base_url() . '/dosen/simpan';
        return view('dosen/input', $data);
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
            return redirect()->to('dosen')->with('success','Data berhasil disimpan');
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
            return redirect()->to('dosen')->with('success', 'Data Dosen ' . $id . 'berhasil dihapus');
        } catch (\Codeigniter\Database\Exceptions\DatabaseException $e) {
            return redirect()-to('dosen')->with('error',$e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">Dosen</h1>
                        </div>
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="'.base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="'.base_url().'/dosen">Dosen</a></li>
                            <li class="breadcrumb-item active">Edit Dosen</li>
                        </ol>
                    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] ='Data Dosen';
        $data['action'] = base_url() . '/dosen/update';

        $data['edit_data'] =$this->pm->find($id);
        return view('dosen/input', $data);
    }
    public function update(){
       $dtEdit = $this->request->getPost();
       $param = $dtEdit['param'];
       unset($dtEdit['param']);
       unset($this->rules['IPK']);
       if (! $this->validate($this->rules)) {

        return redirect()->back()->withinput();
      }
      if (empty($dtEdit['IPK'])){
        unset($dtEdit['IPK']);
      }
      try {
        $this->pm->update($param, $dtEdit);
        return redirect()->to('dosen')->with('success', 'Data berhasil di update');
      } catch (\Codeigniter\Database\Exceptions\DatabaseException $e) {
        session()->setFlashdata('error', $e->getMessage());
        return redirect()->back()->withinput();
      }
    }
}

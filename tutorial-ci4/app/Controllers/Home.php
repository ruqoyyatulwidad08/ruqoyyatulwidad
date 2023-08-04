<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda'=>[
                'title' =>'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=> 'active',
            ],
            'dosen'=>[
                'title' =>'dosen',
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
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Welcome To My Website!";
        $data['selamat_datang'] = "selamat datang di aplikasi sederhana tabel penjadwalan kuliah";
        return view('template/content', $data);
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class matakuliahModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mata kuliah';
    protected $primaryKey       = 'mata kuliah';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['nama_dosen','kode dosen','jadwal dosen','kelas'];
}
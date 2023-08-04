<?php

namespace App\Models;

use CodeIgniter\Model;

class NpmModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'kdkelas';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['NIM','password','login','sukses'];
}

   
<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dosen';
    protected $primaryKey       = 'uts';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['uts', 'uas', 'nilai', 'IPK'];
}

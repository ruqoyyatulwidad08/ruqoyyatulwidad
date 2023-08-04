<?php

namespace App\Models;

use CodeIgniter\Model;

class namamhsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'nama';
    protected $primaryKey       = 'nama';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['NIM','nama','TTL','JK'];
}
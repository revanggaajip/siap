<?php

namespace App\Models;

use CodeIgniter\Model;

class Satuan extends Model
{
    protected $table            = 'satuan';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama'];
    protected $useTimestamps = true;
}

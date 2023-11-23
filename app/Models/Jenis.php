<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenis extends Model
{
    protected $table            = 'jenis';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama'];
    protected $useTimestamps = true;
}

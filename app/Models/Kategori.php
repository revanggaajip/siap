<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori extends Model
{
    protected $table            = 'kategori';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama'];
    protected $useTimestamps = true;
}

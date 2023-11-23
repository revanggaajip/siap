<?php

namespace App\Models;

use CodeIgniter\Model;

class Instansi extends Model
{
    protected $table            = 'instansi';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'alamat', 'telepon'];

    // Dates
    protected $useTimestamps = true;
 
}
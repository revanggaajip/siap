<?php

namespace App\Models;

use CodeIgniter\Model;

class Golongan extends Model
{    
    protected $table            = 'golongan';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama'];
    protected $useTimestamps = true;
}

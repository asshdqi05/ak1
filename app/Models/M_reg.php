<?php

namespace App\Models;

use CodeIgniter\Model;

class M_reg extends Model
{
    protected $table = 'pencaker';
    protected $allowedFields = ['id', 'nik', 'password'];
}

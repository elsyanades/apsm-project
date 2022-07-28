<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelvendor extends Model
{
    protected $table      = 'vendor';
    protected $primaryKey = 'id_vendor';

    protected $allowedFields = ['nama_vendor', 'alamat_vendor', 'telp_vendor'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelcustomer extends Model
{
    protected $table      = 'customers';
    protected $primaryKey = 'id_cust';

    protected $allowedFields = ['nama_cust', 'alamat_cust', 'telp_cust', 'jabatan_cust'];
}
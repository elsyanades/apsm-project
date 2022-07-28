<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmarketing extends Model
{
    protected $table      = 'master_table';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_order', 'nama_cust', 'kota_tujuan','nama_vendor','nama_handling','status_marketing'];
}
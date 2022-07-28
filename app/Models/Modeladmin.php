<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeladmin extends Model
{
    protected $table      = 'master_table';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_order', 'nama_cust', 'no_surat_jalan','status_pembayaran','status_admin'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelstaffops extends Model
{
    protected $table      = 'master_table';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_order', 'status_barang', 'status_surat_jalan','proses_muat','proses_bongkar','status_staf_ops'];
}
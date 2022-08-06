<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmonitoringcs extends Model
{
    protected $table      = 'master_table';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_order', 'status_barang_ke_vendor', 'status_barang_handling','status_barang_sudah_diterima','update_status_ke_customer','status_surat_jalan_kembali','upload_dokumen','status_monitoring_cs'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkepalaops extends Model
{
    protected $table      = 'master_table';
    protected $primaryKey = 'id';

    protected $allowedFields = ['no_order', 'jenis_armada', 'data_armada','staf_ops','status_pickup','status_loading','nama_vendor2','status_ops'];
}
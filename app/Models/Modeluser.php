<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeluser extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['nama_user', 'email_user', 'password_user'];
}
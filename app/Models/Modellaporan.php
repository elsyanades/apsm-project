<?php
namespace App\Models;
use CodeIgniter\Model;

class Modellaporan extends Model
{
    public function choose_date()
    {
        $this->db = db_connect();
        $from  = @$_POST['mulai_tanggal'];
        $to = @$_POST['sampai_tanggal'];

        return $this->db->table('master_table')
            ->where("tgl_order BETWEEN '{$from}' AND '{$to}'")
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function view_report()
    {
        $this->db = db_connect();

        return $this->db->table('master_table')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();
    }
}
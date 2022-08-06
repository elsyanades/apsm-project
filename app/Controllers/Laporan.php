<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Modellaporan;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->Mlaporan = new Modellaporan();
        helper('form');
    }

    public function viewlaporan()
    {
        $data = [
            'title' => 'List Laporan',
            'message'   => 'List Laporan page ',
            'view_report' => $this->Mlaporan->view_report(),
        ];
            return view('laporan/viewlaporan', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Per Tanggal',
            'message'   => 'Laporan Per Tanggal page ',
            'choose_date' => $this->Mlaporan->choose_date(),
        ];
        return view('laporan/index', $data);
    }

    public function print_report()
    {
        $data = [
            'title' => 'Print Goods Report',
            'message'   => 'Goods Report Page ',
            'choose_date' => $this->Mlaporan->choose_date(),
        ];
        return view('laporan/viewprintreport', $data);
    }
}
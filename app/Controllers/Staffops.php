<?php

namespace App\Controllers;

use App\Models\Modelstaffops;
use App\Models\Modeldatastaffops;
use Config\Services;

class Staffops extends BaseController
{
    public function index()
    {
        helper('Akses');
        if (cekaksesstaffops()) 
        {

            return view('staffops/viewtampildata');
        }
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data =  [
                'tampildata' => $this->sops->findAll()
            ];

            $msg = [
                'data' => view('staffops/datastaffops', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }


    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatastaffops($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tomboledit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id . "')\"><i class=\"fa fa-tags\"></i></button>";

                $tombolhapus = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

            //     $tombolupload = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"upload('" . $list->id . "')\">
            //     <i class=\"fa fa-image\"></i>
            // </button>";

                // $row[] = "<input type=\"checkbox\" name=\"id[]\" class=\"centangId\" value=\"$list->id\">";
                $row[] = $no;
                $row[] = $list->no_order;
                $row[] = $list->status_barang;
                $row[] = $list->status_surat_jalan;
                $row[] = $list->proses_muat;     
                $row[] = $list->proses_bongkar;
                $row[] = $list->status_staf_ops;
                $row[] = $tomboledit . " " . $tombolhapus;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }



    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('staffops/modaltambah')
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'no_order' => [
                    'label' => 'Nomor Order',
                    'rules' => 'required|is_unique[master_table.no_order]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama, silahkan coba yang lain'
                    ]
                ],
                // 'staf_ops' => [
                //     'label' => 'Staff Operasional',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong',
                //     ]
                // ]
            ]);

            if (!$valid) {

                $msg = [
                    'error' => [
                        'no_order' => $validation->getError('no_order'),
                        // 'staf_ops' => $validation->getError('staf_ops')
                    ]
                ];
            } else {
                $simpandata = [
                    'no_order' => $this->request->getVar('no_order'),
                    'status_barang' => $this->request->getVar('status_barang'),
                    'status_surat_jalan' => $this->request->getVar('status_surat_jalan'),
                    'proses_muat' => $this->request->getVar('proses_muat'),
                    'proses_bongkar' => $this->request->getVar('proses_bongkar'),
                    'status_staf_ops' => $this->request->getVar('status_staf_ops'),

                ];


                $this->sops->insert($simpandata);

                $msg = [
                    'sukses' => 'Data staff ops berhasil tersimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $row = $this->sops->find($id);

            $data = [
                'id' => $row['id'],
                'no_order' => $row['no_order'],
                'status_barang' => $row['status_barang'],
                'status_surat_jalan' => $row['status_surat_jalan'],
                'proses_muat' => $row['proses_muat'],
                'proses_bongkar' => $row['proses_bongkar'],
                'status_staf_ops' => $row['status_staf_ops'],
            ];

            $msg = [
                'sukses' => view('staffops/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {

            $simpandata = [
                'id' => $this->request->getVar('id'),
                'no_order' => $this->request->getVar('no_order'),
                'status_barang' => $this->request->getVar('status_barang'),
                'status_surat_jalan' => $this->request->getVar('status_surat_jalan'),
                'proses_muat' => $this->request->getVar('proses_muat'),
                'proses_bongkar' => $this->request->getVar('proses_bongkar'),
                'status_staf_ops' => $this->request->getVar('status_staf_ops'),

            ];


            $id= $this->request->getVar('id');

            $this->sops->update($id, $simpandata);

            $msg = [
                'sukses' => 'Data staff ops berhasil diupdate'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $this->sops->delete($id);

            $msg = [
                'sukses' => "Data staff ops berhasil di hapus"
            ];
            echo json_encode($msg);
        }
    }



    // public function formtambahbanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $msg = [
    //             'data' => view('staffops/formtambahbanyak')
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function simpandatabanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_vendor = $this->request->getVar('id_vendor');
    //         $nama_vendor = $this->request->getVar('nama_vendor');
    //         $alamat_vendor = $this->request->getVar('alamat_vendor');
    //         $telp_vendor = $this->request->getVar('telp_vendor');

    //         $jmldata = count($id_vendor);

    //         for ($i = 0; $i < $jmldata; $i++) {
    //             $this->vend->insert([
    //                 'id_vendor' => $id_vendor[$i],
    //                 'nama_vendor' => $nama_vendor[$i],
    //                 'alamat_vendor' => $alamat_vendor[$i],
    //                 'telp_vendor' => $telp_vendor[$i],
    //             ]);
    //         }

    //         $msg = [
    //             'sukses' => "$jmldata data vendor berhasil tersimpan"
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function hapusbanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_vendor = $this->request->getVar('id_vendor');

    //         $jmldata = count($id_vendor);

    //         for ($i = 0; $i < $jmldata; $i++) {
    //             $this->vend->delete($id_vendor[$i]);
    //         }

    //         $msg = [
    //             'sukses' => "$jmldata data vendor berhasil dihapus"
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function formupload()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_vendor = $this->request->getVar('id_vendor');

    //         $data = [
    //             'id_vendor' => $id_vendor
    //         ];

    //         $msg = [
    //             'sukses' => view('staffops/modalupload', $data)
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function doupload()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_vendor = $this->request->getVar('id_vendor');

    //         $validation = \Config\Services::validation();

    //         if ($_FILES['foto']['name'] == NULL && $this->request->getpost('imagecam') == '') {
    //             $msg = ['error' => 'Silahkan pilih salah satu ya...'];
    //         } elseif ($_FILES['foto']['name'] == NULL) {

    //             //cek dulu fotonya
    //             $cekdata = $this->vend->find($id_vendor);
    //             $fotolama = $cekdata['foto'];
    //             if ($fotolama != NULL || $fotolama != "") {
    //                 unlink($fotolama);
    //             }

    //             $image = $this->request->getPost('imagecam');
    //             $image = str_replace('data:image/jpeg;base64,', '', $image);

    //             $image = base64_decode($image, true);
    //             // echo $image;
    //             $filename = $nobp . '.jpg';
    //             file_put_contents(FCPATH . '/assets/images/foto/' . $filename, $image);

    //             $updatedata = [
    //                 'foto' => './assets/images/foto/' . $filename
    //             ];

    //             $this->vend->update($id_vendor, $updatedata);
    //             $msg = [
    //                 'sukses' => 'Foto berhasil di upload menggunakan webcam'
    //             ];
    //         } else {

    //             $valid = $this->validate([
    //                 'foto' => [
    //                     'label' => 'Upload Foto',
    //                     'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
    //                     'errors' => [
    //                         'uploaded' => '{field} wajib diisi',
    //                         'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
    //                     ]
    //                 ]
    //             ]);

    //             if (!$valid) {
    //                 $msg = [
    //                     'error' => [
    //                         'foto' => $validation->getError('foto')
    //                     ]
    //                 ];
    //             } else {

    //                 //cek dulu fotonya
    //                 $cekdata = $this->vend->find($id_vendor);
    //                 $fotolama = $cekdata['foto'];
    //                 if ($fotolama != NULL || $fotolama != "") {
    //                     unlink($fotolama);
    //                 }


    //                 $filefoto = $this->request->getFile('foto');

    //                 $filefoto->move('assets/images/foto', $nobp . '.' . $filefoto->getExtension());

    //                 $updatedata = [
    //                     'foto' => './assets/images/foto/' . $filefoto->getName()
    //                 ];

    //                 $this->vend->update($id_vendor, $updatedata);

    //                 $msg = [
    //                     'sukses' => 'Berhasil diupload'
    //                 ];
    //             }
    //         }

    //         echo json_encode($msg);
    //     }
    // }
}
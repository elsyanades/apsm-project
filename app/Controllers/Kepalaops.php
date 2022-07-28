<?php

namespace App\Controllers;

use App\Models\Modelkepalaops;
use App\Models\Modeldatakepalaops;
use Config\Services;

class Kepalaops extends BaseController
{
    public function index()
    {
        // helper('Akses');
        // if (cekakses()) 
        {

            return view('kepalaops/viewtampildata');
        }
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data =  [
                'tampildata' => $this->kops->findAll()
            ];

            $msg = [
                'data' => view('kepalaops/datakepalaops', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }


    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatakepalaops($request);
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
                $row[] = $list->jenis_armada;
                $row[] = $list->data_armada;
                $row[] = $list->staf_ops;     
                $row[] = $list->status_pickup;
                $row[] = $list->status_loading;
                $row[] = $list->nama_vendor2;
                $row[] = $list->status_ops;
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
                'data' => view('kepalaops/modaltambah')
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
                'staf_ops' => [
                    'label' => 'Staff Operasional',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);

            if (!$valid) {

                $msg = [
                    'error' => [
                        'no_order' => $validation->getError('no_order'),
                        'staf_ops' => $validation->getError('staf_ops')
                    ]
                ];
            } else {
                $simpandata = [
                    'no_order' => $this->request->getVar('no_order'),
                    'jenis_armada' => $this->request->getVar('jenis_armada'),
                    'data_armada' => $this->request->getVar('data_armada'),
                    'staf_ops' => $this->request->getVar('staf_ops'),
                    'status_pickup' => $this->request->getVar('status_pickup'),
                    'status_loading' => $this->request->getVar('status_loading'),
                    'nama_vendor2' => $this->request->getVar('nama_vendor2'),
                    'status_ops' => $this->request->getVar('status_ops'),

                ];


                $this->kops->insert($simpandata);

                $msg = [
                    'sukses' => 'Data kepala ops berhasil tersimpan'
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

            $row = $this->kops->find($id);

            $data = [
                'id' => $row['id'],
                'no_order' => $row['no_order'],
                'jenis_armada' => $row['jenis_armada'],
                'data_armada' => $row['data_armada'],
                'staf_ops' => $row['staf_ops'],
                'status_pickup' => $row['status_pickup'],
                'status_loading' => $row['status_loading'],
                'nama_vendor2' => $row['nama_vendor2'],
                'status_ops' => $row['status_ops'],
            ];

            $msg = [
                'sukses' => view('kepalaops/modaledit', $data)
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
                'jenis_armada' => $this->request->getVar('jenis_armada'),
                'data_armada' => $this->request->getVar('data_armada'),
                'staf_ops' => $this->request->getVar('staf_ops'),
                'status_pickup' => $this->request->getVar('status_pickup'),
                'status_loading' => $this->request->getVar('status_loading'),
                'nama_vendor2' => $this->request->getVar('nama_vendor2'),
                'status_ops' => $this->request->getVar('status_ops'),

            ];


            $id= $this->request->getVar('id');

            $this->kops->update($id, $simpandata);

            $msg = [
                'sukses' => 'Data kepala ops berhasil diupdate'
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

            $this->kops->delete($id);

            $msg = [
                'sukses' => "Data kepala ops berhasil di hapus"
            ];
            echo json_encode($msg);
        }
    }



    // public function formtambahbanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $msg = [
    //             'data' => view('kepalaops/formtambahbanyak')
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
    //             'sukses' => view('kepalaops/modalupload', $data)
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
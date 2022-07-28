<?php

namespace App\Controllers;

use App\Models\Modelcustomer;
use App\Models\Modeldatacustomer;
use Config\Services;

class Customer extends BaseController
{
    public function index()
    {
        // helper('Akses');
        // if (cekakses()) 
        {

            return view('customer/viewtampildata');
        }
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data =  [
                'tampildata' => $this->cust->findAll()
            ];

            $msg = [
                'data' => view('customer/datacustomer', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }


    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatacustomer($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tomboledit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_cust . "')\"><i class=\"fa fa-tags\"></i></button>";

                $tombolhapus = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_cust . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

                $tombolupload = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"upload('" . $list->id_cust . "')\">
                <i class=\"fa fa-image\"></i>
            </button>";

                $row[] = "<input type=\"checkbox\" name=\"id_cust[]\" class=\"centangId\" value=\"$list->id_cust\">";
                $row[] = $no;
                $row[] = $list->nama_cust;
                $row[] = $list->alamat_cust;
                $row[] = $list->telp_cust;
                $row[] = $list->jabatan_cust;
                $row[] = $tomboledit . " " . $tombolhapus . " " . $tombolupload;
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
                'data' => view('customer/modaltambah')
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
                'nama_cust' => [
                    'label' => 'Nama customer',
                    'rules' => 'required|is_unique[customers.nama_cust]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama, silahkan coba yang lain'
                    ]
                ],
                'telp_cust' => [
                    'label' => 'Telepon customer',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);

            if (!$valid) {

                $msg = [
                    'error' => [
                        'nama_cust' => $validation->getError('nama_cust'),
                        'telp_cust' => $validation->getError('telp_cust')
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_cust' => $this->request->getVar('nama_cust'),
                    'alamat_cust' => $this->request->getVar('alamat_cust'),
                    'telp_cust' => $this->request->getVar('telp_cust'),
                    'jabatan_cust' => $this->request->getVar('jabatan_cust'),

                ];


                $this->cust->insert($simpandata);

                $msg = [
                    'sukses' => 'Data customer berhasil tersimpan'
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
            $id_cust = $this->request->getVar('id_cust');

            $row = $this->cust->find($id_cust);

            $data = [
                'id_cust' => $row['id_cust'],
                'nama_cust' => $row['nama_cust'],
                'alamat_cust' => $row['alamat_cust'],
                'telp_cust' => $row['telp_cust'],
                'jabatan_cust' => $row['jabatan_cust'],
            ];

            $msg = [
                'sukses' => view('customer/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {

            $simpandata = [
                'id_cust' => $this->request->getVar('id_cust'),
                'nama_cust' => $this->request->getVar('nama_cust'),
                'alamat_cust' => $this->request->getVar('alamat_cust'),
                'telp_cust' => $this->request->getVar('telp_cust'),
                'jabatan_cust' => $this->request->getVar('jabatan_cust'),

            ];


            $id_cust = $this->request->getVar('id_cust');

            $this->cust->update($id_cust, $simpandata);

            $msg = [
                'sukses' => 'Data customer berhasil diupdate'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_cust = $this->request->getVar('id_cust');

            // $mhs = new Modelmahasiswa;

            $this->cust->delete($id_cust);

            $msg = [
                'sukses' => "Data customer berhasil di hapus"
            ];
            echo json_encode($msg);
        }
    }



    public function formtambahbanyak()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('customer/formtambahbanyak')
            ];

            echo json_encode($msg);
        }
    }

    public function simpandatabanyak()
    {
        if ($this->request->isAJAX()) {
            $id_cust = $this->request->getVar('id_cust');
            $nama_cust = $this->request->getVar('nama_cust');
            $alamat_cust = $this->request->getVar('alamat_cust');
            $telp_cust = $this->request->getVar('telp_cust');
            $jabatan_cust = $this->request->getVar('jabatan_cust');

            $jmldata = count($id_cust);

            for ($i = 0; $i < $jmldata; $i++) {
                $this->cust->insert([
                    'id_cust' => $id_cust[$i],
                    'nama_cust' => $nama_cust[$i],
                    'alamat_cust' => $alamat_cust[$i],
                    'telp_cust' => $telp_cust[$i],
                    'jabatan_cust' => $jabatan_cust[$i],
                ]);
            }

            $msg = [
                'sukses' => "$jmldata data customer berhasil tersimpan"
            ];

            echo json_encode($msg);
        }
    }

    public function hapusbanyak()
    {
        if ($this->request->isAJAX()) {
            $id_cust = $this->request->getVar('id_cust');

            $jmldata = count($id_cust);

            for ($i = 0; $i < $jmldata; $i++) {
                $this->cust->delete($id_cust[$i]);
            }

            $msg = [
                'sukses' => "$jmldata data customer berhasil dihapus"
            ];

            echo json_encode($msg);
        }
    }

    // public function formupload()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_customer = $this->request->getVar('id_customer');

    //         $data = [
    //             'id_customer' => $id_customer
    //         ];

    //         $msg = [
    //             'sukses' => view('customer/modalupload', $data)
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function doupload()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_customer = $this->request->getVar('id_customer');

    //         $validation = \Config\Services::validation();

    //         if ($_FILES['foto']['name'] == NULL && $this->request->getpost('imagecam') == '') {
    //             $msg = ['error' => 'Silahkan pilih salah satu ya...'];
    //         } elseif ($_FILES['foto']['name'] == NULL) {

    //             //cek dulu fotonya
    //             $cekdata = $this->cust->find($id_customer);
    //             $fotolama = $cekdata['foto'];
    //             if ($fotolama != NULL || $fotolama != "") {
    //                 unlink($fotolama);
    //             }

    //             $image = $this->request->getPost('imagecam');
    //             $image = str_replace('data:image/jpeg;base64,', '', $image);

    //             $image = base64_decode($image, true);
    //             // echo $image;
    //             $filename = $id_customer . '.jpg';
    //             file_put_contents(FCPATH . '/assets/images/foto/' . $filename, $image);

    //             $updatedata = [
    //                 'foto' => './assets/images/foto/' . $filename
    //             ];

    //             $this->cust->update($id_customer, $updatedata);
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
    //                 $cekdata = $this->cust->find($id_customer);
    //                 $fotolama = $cekdata['foto'];
    //                 if ($fotolama != NULL || $fotolama != "") {
    //                     unlink($fotolama);
    //                 }


    //                 $filefoto = $this->request->getFile('foto');

    //                 $filefoto->move('assets/images/foto', $nobp . '.' . $filefoto->getExtension());

    //                 $updatedata = [
    //                     'foto' => './assets/images/foto/' . $filefoto->getName()
    //                 ];

    //                 $this->cust->update($id_customer, $updatedata);

    //                 $msg = [
    //                     'sukses' => 'Berhasil diupload'
    //                 ];
    //             }
    //         }

    //         echo json_encode($msg);
    //     }
    // }
}
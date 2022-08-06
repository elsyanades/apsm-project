<?php

namespace App\Controllers;

use App\Models\Modeluser;
use App\Models\Modeldatauser;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        // helper('Akses');
        // if (cekakses()) 
        {

            return view('user/viewtampildata');
        }
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data =  [
                'tampildata' => $this->usr->findAll()
            ];

            $msg = [
                'data' => view('user/datauser', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }


    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatauser($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tomboledit = "<button type=\"button\" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_user . "')\"><i class=\"fa fa-tags\"></i></button>";

                $tombolhapus = "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_user . "')\">
                <i class=\"fa fa-trash\"></i>
            </button>";

            //     $tombolupload = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"upload('" . $list->id_user . "')\">
            //     <i class=\"fa fa-image\"></i>
            // </button>";

                // $row[] = "<input type=\"checkbox\" name=\"id_user[]\" class=\"centangId\" value=\"$list->id_user\">";
                $row[] = $no;
                $row[] = $list->nama_user;
                $row[] = $list->username;
                $row[] = $list->email_user;
                $row[] = $list->levelnama;
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
                'data' => view('user/modaltambah')
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
                'nama_user' => [
                    'label' => 'Nama user',
                    'rules' => 'required|is_unique[users.nama_user]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tidak boleh ada yang sama, silahkan coba yang lain'
                    ]
                ],
                'email_user' => [
                    'label' => 'Email user',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password_user' => [
                    'label' => 'Password user',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ]
            ]);

            if (!$valid) {

                $msg = [
                    'error' => [
                        'nama_user' => $validation->getError('nama_user'),
                        'email_user' => $validation->getError('email_user'),
                        'password_user' => $validation->getError('password_user')
                    ]
                ];
            } else {
                $simpandata = [
                    'nama_user' => $this->request->getVar('nama_user'),
                    'email_user' => $this->request->getVar('email_user'),
                    'password_user' => $this->request->getVar('password_user'),

                ];


                $this->usr->insert($simpandata);

                $msg = [
                    'sukses' => 'Data user berhasil tersimpan'
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
            $id_user = $this->request->getVar('id_user');

            $row = $this->usr->find($id_user);

            $data = [
                'id_user' => $row['id_user'],
                'nama_user' => $row['nama_user'],
                'email_user' => $row['email_user'],
                'password_user' => $row['password_user'],
            ];

            $msg = [
                'sukses' => view('user/modaledit', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {

            $simpandata = [
                'id_user' => $this->request->getVar('id_user'),
                'nama_user' => $this->request->getVar('nama_user'),
                'email_user' => $this->request->getVar('email_user'),
                'password_user' => $this->request->getVar('password_user'),

            ];


            $id_user = $this->request->getVar('id_user');

            $this->usr->update($id_user, $simpandata);

            $msg = [
                'sukses' => 'Data user berhasil diupdate'
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_user = $this->request->getVar('id_user');

            // $mhs = new Modelmahasiswa;

            $this->usr->delete($id_user);

            $msg = [
                'sukses' => "Data user berhasil di hapus"
            ];
            echo json_encode($msg);
        }
    }



    // public function formtambahbanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $msg = [
    //             'data' => view('user/formtambahbanyak')
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function simpandatabanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_user = $this->request->getVar('id_user');
    //         $nama_user = $this->request->getVar('nama_user');
    //         $alamat_user = $this->request->getVar('alamat_user');
    //         $telp_user = $this->request->getVar('telp_user');

    //         $jmldata = count($id_user);

    //         for ($i = 0; $i < $jmldata; $i++) {
    //             $this->usr->insert([
    //                 'id_user' => $id_user[$i],
    //                 'nama_user' => $nama_user[$i],
    //                 'alamat_user' => $alamat_user[$i],
    //                 'telp_user' => $telp_user[$i],
    //             ]);
    //         }

    //         $msg = [
    //             'sukses' => "$jmldata data user berhasil tersimpan"
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function hapusbanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_user = $this->request->getVar('id_user');

    //         $jmldata = count($id_user);

    //         for ($i = 0; $i < $jmldata; $i++) {
    //             $this->usr->delete($id_user[$i]);
    //         }

    //         $msg = [
    //             'sukses' => "$jmldata data user berhasil dihapus"
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function formupload()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_user = $this->request->getVar('id_user');

    //         $data = [
    //             'id_user' => $id_user
    //         ];

    //         $msg = [
    //             'sukses' => view('user/modalupload', $data)
    //         ];

    //         echo json_encode($msg);
    //     }
    // }

    // public function doupload()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id_user = $this->request->getVar('id_user');

    //         $validation = \Config\Services::validation();

    //         if ($_FILES['foto']['name'] == NULL && $this->request->getpost('imagecam') == '') {
    //             $msg = ['error' => 'Silahkan pilih salah satu ya...'];
    //         } elseif ($_FILES['foto']['name'] == NULL) {

    //             //cek dulu fotonya
    //             $cekdata = $this->usr->find($id_user);
    //             $fotolama = $cekdata['foto'];
    //             if ($fotolama != NULL || $fotolama != "") {
    //                 unlink($fotolama);
    //             }

    //             $image = $this->request->getPost('imagecam');
    //             $image = str_replace('data:image/jpeg;base64,', '', $image);

    //             $image = base64_decode($image, true);
    //             // echo $image;
    //             $filename = $id_user . '.jpg';
    //             file_put_contents(FCPATH . '/assets/images/foto/' . $filename, $image);

    //             $updatedata = [
    //                 'foto' => './assets/images/foto/' . $filename
    //             ];

    //             $this->usr->update($id_user, $updatedata);
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
    //                 $cekdata = $this->usr->find($id_user);
    //                 $fotolama = $cekdata['foto'];
    //                 if ($fotolama != NULL || $fotolama != "") {
    //                     unlink($fotolama);
    //                 }


    //                 $filefoto = $this->request->getFile('foto');

    //                 $filefoto->move('assets/images/foto', $nobp . '.' . $filefoto->getExtension());

    //                 $updatedata = [
    //                     'foto' => './assets/images/foto/' . $filefoto->getName()
    //                 ];

    //                 $this->usr->update($id_user, $updatedata);

    //                 $msg = [
    //                     'sukses' => 'Berhasil diupload'
    //                 ];
    //             }
    //         }

    //         echo json_encode($msg);
    //     }
    // }
}
<?php

namespace App\Controllers;

use App\Models\Modelmonitoringcs;
use App\Models\Modeldatamonitoringcs;
use Config\Services;

class Monitoringcs extends BaseController
{
    public function index()
    {
        helper('Akses');
        if (cekaksesmonitoringcs()) 
        {

            return view('monitoringcs/viewtampildata');
        }
    }

    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data =  [
                'tampildata' => $this->moncs->findAll()
            ];

            $msg = [
                'data' => view('monitoringcs/datamonitoringcs', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Maaf tidak dapat diproses');
        }
    }


    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatamonitoringcs($request);
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

                $tombolupload = "<button type=\"button\" class=\"btn btn-warning btn-sm\" onclick=\"upload('" . $list->id . "')\">
                <i class=\"fa fa-image\"></i>
                </button>";
                $gambar = "<a href='". $list->upload_dokumen ."' target='blank' /><img src='". $list->upload_dokumen ."'  /></a>";

                // $row[] = "<input type=\"checkbox\" name=\"id[]\" class=\"centangId\" value=\"$list->id\">";
                $row[] = $no;
                $row[] = $list->no_order;
                $row[] = $list->status_barang_ke_vendor;
                $row[] = $list->status_barang_handling;
                $row[] = $list->status_barang_sudah_diterima;
                $row[] = $list->update_status_ke_customer;
                $row[] = $list->status_surat_jalan_kembali;
                $row[] = $gambar;
                $row[] = $list->status_monitoring_cs;
                $row[] = $tomboledit . " " . $tombolhapus. " " . $tombolupload;
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
                'data' => view('monitoringcs/modaltambah')
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
                // 'nama_cust' => [
                //     'label' => 'Nama Customer',
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
                        // 'nama_cust' => $validation->getError('nama_cust')
                    ]
                ];
            } else {
                $simpandata = [
                    'no_order' => $this->request->getVar('no_order'),
                    'status_barang_ke_vendor' => $this->request->getVar('status_barang_ke_vendor'),
                    'status_barang_handling' => $this->request->getVar('status_barang_handling'),
                    'status_barang_sudah_diterima' => $this->request->getVar('status_barang_sudah_diterima'),
                    'update_status_ke_customer' => $this->request->getVar('update_status_ke_customer'),
                    'status_surat_jalan_kembali' => $this->request->getVar('status_surat_jalan_kembali'),
                    'upload_dokumen' => $this->request->getVar('upload_dokumen'),
                    'status_monitoring_cs' => $this->request->getVar('status_monitoring_cs'),

                ];


                $this->moncs->insert($simpandata);

                $msg = [
                    'sukses' => 'Data monitoringcs berhasil tersimpan'
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

            $row = $this->moncs->find($id);

            $data = [
                'id' => $row['id'],
                'no_order' => $row['no_order'],
                'status_barang_ke_vendor' => $row['status_barang_ke_vendor'],
                'status_barang_handling' => $row['status_barang_handling'],
                'status_barang_sudah_diterima' => $row['status_barang_sudah_diterima'],
                'update_status_ke_customer' => $row['update_status_ke_customer'],
                'status_surat_jalan_kembali' => $row['status_surat_jalan_kembali'],
                'upload_dokumen' => $row['upload_dokumen'],
                'status_monitoring_cs' => $row['status_monitoring_cs'],
            ];

            $msg = [
                'sukses' => view('monitoringcs/modaledit', $data)
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
                'status_barang_ke_vendor' => $this->request->getVar('status_barang_ke_vendor'),
                'status_barang_handling' => $this->request->getVar('status_barang_handling'),
                'status_barang_sudah_diterima' => $this->request->getVar('status_barang_sudah_diterima'),
                'update_status_ke_customer' => $this->request->getVar('update_status_ke_customer'),
                'status_surat_jalan_kembali' => $this->request->getVar('status_surat_jalan_kembali'),
                'upload_dokumen' => $this->request->getVar('upload_dokumen'),
                'status_monitoring_cs' => $this->request->getVar('status_monitoring_cs'),

            ];


            $id= $this->request->getVar('id');

            $this->moncs->update($id, $simpandata);

            $msg = [
                'sukses' => 'Data monitoring cs berhasil diupdate'
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

            $this->moncs->delete($id);

            $msg = [
                'sukses' => "Data monitoring cs berhasil di hapus"
            ];
            echo json_encode($msg);
        }
    }



    // public function formtambahbanyak()
    // {
    //     if ($this->request->isAJAX()) {
    //         $msg = [
    //             'data' => view('monitoringcs/formtambahbanyak')
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

    public function formupload()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'id' => $id
            ];

            $msg = [
                'sukses' => view('monitoringcs/modalupload', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function doupload()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $validation = \Config\Services::validation();

            if ($_FILES['upload_dokumen']['name'] == NULL && $this->request->getpost('imagecam') == '') {
                $msg = ['error' => 'Silahkan pilih salah satu ya...'];
            } elseif ($_FILES['upload_dokumen']['name'] == NULL) {

                //cek dulu fotonya
                $cekdata = $this->moncs->find($id);
                $fotolama = $cekdata['upload_dokumen'];
                if ($fotolama != NULL || $fotolama != "") {
                    unlink($fotolama);
                }

                $image = $this->request->getPost('imagecam');
                $image = str_replace('data:image/jpeg;base64,', '', $image);

                $image = base64_decode($image, true);
                // echo $image;
                $filename = $id . '.jpg';
                file_put_contents(FCPATH . '/template/assets/images/dokumenupload/' . $filename, $image);

                $updatedata = [
                    'upload_dokumen' => './template/assets/images/dokumenupload/' . $filename
                ];

                $this->moncs->update($id, $updatedata);
                $msg = [
                    'sukses' => 'Foto berhasil di upload menggunakan kamera'
                ];
            } else {

                $valid = $this->validate([
                    'upload_dokumen' => [
                        'label' => 'Upload Foto',
                        'rules' => 'uploaded[upload_dokumen]|mime_in[upload_dokumen,image/png,image/jpg,image/jpeg]|is_image[upload_dokumen]',
                        'errors' => [
                            'uploaded' => '{field} wajib diisi',
                            'mime_in' => 'Harus dalam bentuk gambar, jangan file yang lain'
                        ]
                    ]
                ]);

                if (!$valid) {
                    $msg = [
                        'error' => [
                            'upload_dokumen' => $validation->getError('upload_dokumen')
                        ]
                    ];
                } else {

                    //cek dulu fotonya
                    $cekdata = $this->moncs->find($id);
                    $fotolama = isset($cekdata['upload_dokumen']);
                    if ($fotolama != NULL || $fotolama != "") {
                        unlink($fotolama);
                    }


                    $filefoto = $this->request->getFile('upload_dokumen');
                    // Manipulasi gambar
                     $image = \Config\Services::image()
                    ->withFile($filefoto)
                    ->resize(100, 50, true, 'height')
                    ->save(FCPATH .'/template/assets/images/dokumenupload/'. $filefoto->getName());

                    $updatedata = [
                        'upload_dokumen' => './template/assets/images/dokumenupload/' . $filefoto->getName()
                    ];

                    $this->moncs->update($id, $updatedata);

                    $msg = [
                        'sukses' => 'Foto Berhasil diupload'
                    ];
                }
            }

            echo json_encode($msg);
        }
    } 
}
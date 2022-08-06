<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        return view('login/index');
    }

    public function cekuser()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password_user');

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

                'password_user' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'username' => $validation->getError('username'),
                        'password_user' => $validation->getError('password_user'),
                    ]
                ];
            } 
            else {

                //cek user dulu ke database
                $query_cekuser = $this->db->query("SELECT * FROM users JOIN levels ON levelid=userlevelid WHERE username='$username'");

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    // lanjutkan
                    $row = $query_cekuser->getRow();
                    $password_user = $row->password_user;

                    if (password_verify($password, $password_user)) {
                        //buat session
                        $simpan_session = [
                            'login' => true,
                            'username' => $username,
                            'nama_user' => $row->nama_user,
                            'levelid' => $row->userlevelid,
                            'levelnama' => $row->levelnama
                        ];
                        $this->session->set($simpan_session);

                        $msg = [
                            'sukses' => [
                                'link' => site_url('home')
                            ]
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'password_user' => 'Maaf password anda salah'
                            ]
                        ];
                    }
                } 
                else {
                    $msg = [
                        'error' => [
                            'username' => 'Maaf Username tidak ditemukan'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    // function test()
    // {
    //     echo password_hash('123', PASSWORD_BCRYPT);
    // }
}
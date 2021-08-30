<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Auth extends BaseController
{
    protected $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new Model_Auth();
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation(),
        ];
        return view('v_register', $data);
    }
    public function save_register()
    {

        // $data = $this->request->getVar();
        // dd($data);

        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi dan tidak boleh kosong.',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib Di isi dan tidak boleh kosong.',
                    'is_unique' => '{field} Sudah Di gunakan.',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi dan tidak boleh kosong.',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi dan tidak boleh kosong.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajib Di isi dan tidak boleh kosong.',
                    'matches' => '{field} tidak sama'
                ]
            ],

        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('register')->withInput();
        }

        $this->ModelAuth->save([
            'nama_user' => $this->request->getVar('nama_user'),
            'email' =>  $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'password' => $this->request->getVar('password'),
            'level' =>  '1',
            'foto_user' => 'default.png'
        ]);

        session()->setFlashdata('pesan', 'Register Berhasil');

        return redirect()->to('register');
    }
    public function login()
    {
        // if (session()->get('log') == true) {
        //     return redirect()->to('home');
        // }

        $data = [
            'title' => 'Login',
        ];
        return view('v_login', $data);
    }
    public function cek_login()
    {

        $cek = $this->ModelAuth->where([
            'email' => $this->request->getVar('email'),
            'password' => MD5($this->request->getVar('password')),
        ])->first();

        if ($cek) {
            session()->set('log', true);
            session()->set('nama_user', $cek['nama_user']);
            session()->set('email', $cek['email']);
            session()->set('level', $cek['level']);
            session()->set('foto_user', $cek['foto_user']);

            return redirect()->to('/home');
        } else {
            session()->setFlashdata('gagal', 'Akun Tidak Di Temukan');
            return redirect()->to('/login');
        }


        return view('v_login');
    }
    public function logout()
    {
        // if (session()->get('log') != true) {
        //     session()->setFlashdata('gagal', 'Belum Login Kok Sudah Mau Logout');
        //     return redirect()->to('/login');
        // }

        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->remove('foto_user');
        session()->setFlashdata('pesan', 'Logout Berhasil');
        return redirect()->to('/login');
    }
}

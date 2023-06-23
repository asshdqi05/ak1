<?php

namespace App\Controllers;

use App\Models\M_reg;

class C_front extends BaseController
{

    public function index()
    {
        return view('template_front/V_index');
    }


    public function cek_nik()
    {
        $db   = \Config\Database::connect();
        $nik = $this->request->getPost('nik');
        $cek = $db->table('pencaker')->getWhere(array('nik' => $nik))->getRow();
        if ($cek == "") {
            echo '<span class="text-success">
            NIK Tersedia.
          </span>';
        } else {
            echo '<span class="text-danger">
            NIK Sudah Terdaftar!!.
          </span>';
        }
    }

    public function registrasi()
    {
        $db   = \Config\Database::connect();
        $nik = $this->request->getPost('nik');
        $cek = $db->table('pencaker')->getWhere(array('nik' => $nik))->getRow();
        if ($cek == "") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'password' => password_hash($this->request->getpost('password'), PASSWORD_DEFAULT),
                'flag' => 1,
                'tanggal_daftar' => date('Y-m-d')
            ];
            $db->table('pencaker')->insert($data);

            $id_pencaker = $db->insertID();
            $d = ['id_pencaker' => $id_pencaker];
            $db->table('berkas_pencaker')->insert($d);
            $db->table('pengajuan_ak1')->insert($d);

            session()->setflashdata('sukses', 'Registrasi Akun Berhasil. Silahkan Login Untuk Melanjutkan Pengisian data.');
            return redirect()->to(base_url('C_front'));
        } else {
            session()->setflashdata('error', 'Registrasi Akun Gagal. NIK Yang anda masukan sudah terdaftar!.');
            return redirect()->to(base_url('C_front'));
        }
    }

    public function login()
    {
        $session = session();
        $model = new M_reg();
        $username = $this->request->getVar('nik');
        $password = $this->request->getVar('password');
        $data = $model->where('nik', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'nama'     => $data['nama'],
                    'nik'    => $data['nik'],
                    'password'    => $data['password'],
                    'logged_in_pencaker'     => TRUE
                ];
                $session->set($ses_data);
                $session->setflashdata('sukses', 'Login Berhasil.');
                return redirect()->to(base_url('C_home_pencaker'));
            } else {
                $session->setFlashdata('error', 'Password Anda Salah!');
                return redirect()->to(base_url('C_front'));
            }
        } else {
            $session->setFlashdata('error', 'NIK Tidak Terdaftar!');
            return redirect()->to(base_url('C_front'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setflashdata('sukses', 'Logout Berhasil.');
        return redirect()->to(base_url('C_front'));
    }
}

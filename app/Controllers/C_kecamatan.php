<?php

namespace App\Controllers;

class C_kecamatan extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Kecamatan';
        $data['data'] = $db->table('kecamatan')->get()->getResult();
        return view('master/V_kecamatan', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_kecamatan' => $this->request->getPost('nama'),
        ];
        $db->table('kecamatan')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_kecamatan'));
    }

    public function edit()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_kecamatan' => $this->request->getPost('nama'),
        ];
        $id = $this->request->getPost('id');
        $db->table('kecamatan')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_kecamatan'));
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('nagari')->delete(array('id_kecamatan' => $id));
        $db->table('kecamatan')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_kecamatan'));
    }
}

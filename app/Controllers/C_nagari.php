<?php

namespace App\Controllers;

class C_nagari extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data nagari';
        $data['data'] = $db->table('nagari')->select('*,nagari.id as id_nagari')->join('kecamatan', 'nagari.id_kecamatan=kecamatan.id')->get()->getResult();
        $data['kecamatan'] = $db->table('kecamatan')->get()->getResult();
        return view('master/V_nagari', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $data = [
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'nama_nagari' => $this->request->getPost('nama'),
        ];
        $db->table('nagari')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_nagari'));
    }

    public function edit()
    {
        $db   = \Config\Database::connect();
        $data = [
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'nama_nagari' => $this->request->getPost('nama'),
        ];
        $id = $this->request->getPost('id');
        $db->table('nagari')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_nagari'));
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('nagari')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_nagari'));
    }
}

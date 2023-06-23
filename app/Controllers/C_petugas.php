<?php

namespace App\Controllers;

class C_petugas extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data petugas';
        $data['data'] = $db->table('petugas')->get()->getResult();
        return view('master/V_petugas', $data);
    }

    public function save()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];
        $db->table('petugas')->insert($data);
        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_petugas'));
    }

    public function edit()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];
        $id = $this->request->getPost('id');
        $db->table('petugas')->update($data, array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Update.');
        return redirect()->to(base_url('C_petugas'));
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('petugas')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_petugas'));
    }
}

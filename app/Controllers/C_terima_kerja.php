<?php

namespace App\Controllers;


class C_terima_kerja extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $session = session();

        $data['judul_halaman'] = 'Input Terima Kerja';
        $data['biodata'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->where('pencaker.id',  $session->get('id'))
            ->get()->getRow();
        $data['kerja'] = $db->table('detail_pekerjaan')->select('*')
            ->where('id_pencaker',  $session->get('id'))
            ->orderBy('tanggal', 'desc')
            ->get()->getResult();
        // $data['kerja'] = $db->table('detail_pekerjaan')->getWhere(array('id_pencaker' => $session->get('id')))->getRow();
        return view('terima_kerja/V_terima_kerja', $data);
    }

    public function save_pekerjaan()
    {
        $db   = \Config\Database::connect();
        $biodata = [
            'status_kerja' => "Sudah Bekerja"
        ];
        $id = $this->request->getPost('id');
        $db->table('pencaker')->update($biodata, array('id' => $id));

        $data = [
            'id_pencaker' => $this->request->getPost('id'),
            'nama_pekerjaan' => $this->request->getPost('nama_pekerjaan'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'tanggal' => $this->request->getPost('tanggal')
        ];
        $db->table('detail_pekerjaan')->insert($data);

        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_terima_kerja'));
    }

    public function update_pekerjaan()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nama_pekerjaan' => $this->request->getPost('nama_pekerjaan'),
            'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
            'tanggal' => $this->request->getPost('tanggal')
        ];
        $id = $this->request->getPost('id');
        $db->table('detail_pekerjaan')->update($data, array('id' => $id));

        session()->setflashdata('sukses', 'Data Berhasil Disimpan.');
        return redirect()->to(base_url('C_terima_kerja'));
    }

    public function hapus_pekerjaan()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('detail_pekerjaan')->delete(array('id' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_terima_kerja'));
    }
}

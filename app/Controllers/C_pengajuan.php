<?php

namespace App\Controllers;

class C_pengajuan extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pengajuan Kartu AK1';
        $data['data'] = $db->table('pengajuan_ak1')->select('*,pengajuan_ak1.id as id_pengajuan')
            ->join('pencaker', 'pencaker.id=pengajuan_ak1.id_pencaker', 'left')
            ->where('status', 1)
            ->get()->getResult();
        return view('pengajuan_ak1_admin/V_list_data', $data);
    }

    public function verifikasi($id = "")
    {
        $db   = \Config\Database::connect();

        $data['judul_halaman'] = 'Data Pencaker';
        $data['biodata'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->where('pencaker.id',  $id)
            ->get()->getRow();
        $data['berkas'] = $db->table('berkas_pencaker')->getWhere(array('id_pencaker' => $id))->getRow();
        $data['pengajuan'] = $db->table('pengajuan_ak1')->getWhere(array('id_pencaker' => $id))->getRow();
        return view('pengajuan_ak1_admin/V_verifikasi', $data);
    }

    public function konfirmasi_verifikasi()
    {
        $db   = \Config\Database::connect();

        $data = [
            'berlaku_awal' => date('Y-m-d'),
            'berlaku_akhir' => date('Y-m-d', strtotime('+2 year')),
            'status' => 2
        ];
        $id = $this->request->getPost('id');
        $db->table('pengajuan_ak1')->update($data, array('id_pencaker' => $id));

        session()->setflashdata('sukses', 'Data Pencaker Berhasil DiVerifikasi.');
        return redirect()->to(base_url('C_pengajuan'));
    }

    public function tolak_berkas_pas_foto()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $id_berkas = $this->request->getPost('id_berkas');
        $dt = $db->table('berkas_pencaker')->getWhere(['id' => $id_berkas])->getRow();
        $path = './file/pas_foto/';
        @unlink($path . $dt->pas_foto);
        $data = [
            'pas_foto' => NULL,
            'status_pas_photo' => "ditolak",
            'ctt_tolak_pas_photo' => $this->request->getPost('ctt_tolak')
        ];
        $db->table('berkas_pencaker')->update($data, ['id' => $id_berkas]);
        session()->setflashdata('sukses', 'File Berhasil Ditolak.');
        return redirect()->to(base_url('C_pengajuan/verifikasi/' . $id));
    }

    public function tolak_berkas_ktp()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $id_berkas = $this->request->getPost('id_berkas');
        $dt = $db->table('berkas_pencaker')->getWhere(['id' => $id_berkas])->getRow();
        $path = './file/ktp/';
        @unlink($path . $dt->ktp);
        $data = [
            'ktp' => NULL,
            'status_ktp' => "ditolak",
            'ctt_tolak_ktp' => $this->request->getPost('ctt_tolak')
        ];
        $db->table('berkas_pencaker')->update($data, ['id' => $id_berkas]);
        session()->setflashdata('sukses', 'File Berhasil Ditolak.');
        return redirect()->to(base_url('C_pengajuan/verifikasi/' . $id));
    }

    public function tolak_berkas_ijazah()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $id_berkas = $this->request->getPost('id_berkas');
        $dt = $db->table('berkas_pencaker')->getWhere(['id' => $id_berkas])->getRow();
        $path = './file/ijazah/';
        @unlink($path . $dt->ijazah);
        $data = [
            'ijazah' => NULL,
            'status_ijazah' => "ditolak",
            'ctt_tolak_ijazah' => $this->request->getPost('ctt_tolak')
        ];
        $db->table('berkas_pencaker')->update($data, ['id' => $id_berkas]);
        session()->setflashdata('sukses', 'File Berhasil Ditolak.');
        return redirect()->to(base_url('C_pengajuan/verifikasi/' . $id));
    }

    public function tolak_berkas_vaksin()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $id_berkas = $this->request->getPost('id_berkas');
        $dt = $db->table('berkas_pencaker')->getWhere(['id' => $id_berkas])->getRow();
        $path = './file/vaksin/';
        @unlink($path . $dt->vaksin);
        $data = [
            'vaksin' => NULL,
            'status_vaksin' => "ditolak",
            'ctt_tolak_vaksin' => $this->request->getPost('ctt_tolak')
        ];
        $db->table('berkas_pencaker')->update($data, ['id' => $id_berkas]);
        session()->setflashdata('sukses', 'File Berhasil Ditolak.');
        return redirect()->to(base_url('C_pengajuan/verifikasi/' . $id));
    }
}

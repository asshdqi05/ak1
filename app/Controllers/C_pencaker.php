<?php

namespace App\Controllers;

class C_pencaker extends BaseController
{
    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Data Pencaker';
        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');
        if ($tgl_awal == "" && $tgl_akhir == "") {
            $data['data'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
                ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
                ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
                ->get()->getResult();
        } else {
            $data['data'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
                ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
                ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
                ->where('tanggal_daftar >=', $tgl_awal)
                ->where('tanggal_daftar <=', $tgl_akhir)
                ->get()->getResult();
        }
        return view('pencaker/V_list_data', $data);
    }

    public function detail($id = "")
    {
        $db   = \Config\Database::connect();

        $data['judul_halaman'] = 'Data Pencaker';
        $data['biodata'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->where('pencaker.id',  $id)
            ->get()->getRow();
        $data['kerja'] = $db->table('detail_pekerjaan')->select('*')
            ->where('id_pencaker',  $id)
            ->orderBy('tanggal', 'desc')
            ->get()->getResult();
        $data['berkas'] = $db->table('berkas_pencaker')->getWhere(array('id_pencaker' => $id))->getRow();
        $data['pengajuan'] = $db->table('pengajuan_ak1')->getWhere(array('id_pencaker' => $id))->getRow();
        return view('pencaker/V_detail', $data);
    }

    public function delete()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $db->table('pencaker')->delete(array('id' => $id));
        $db->table('pengajuan_ak1')->delete(array('id_pencaker' => $id));

        $dt = $db->table('berkas_pencaker')->getWhere(['id_pencaker' => $id])->getRow();

        $path_paspoto = './file/pas_foto/';
        @unlink($path_paspoto . $dt->pas_foto);

        $path_ktp = './file/ktp/';
        @unlink($path_ktp . $dt->ktp);

        $path_ijazah = './file/ijazah/';
        @unlink($path_ijazah . $dt->ijazah);

        $path_vaksin = './file/vaksin/';
        @unlink($path_vaksin . $dt->vaksin);

        $db->table('berkas_pencaker')->delete(array('id_pencaker' => $id));
        session()->setflashdata('sukses', 'Data Berhasil Di Hapus.');
        return redirect()->to(base_url('C_pencaker'));
    }
}

<?php

namespace App\Controllers;

class C_laporan extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan';
        $data['kecamatan'] = $db->table('kecamatan')->get()->getResult();
        return view('laporan/V_index', $data);
    }

    public function laporan_petugas()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Data petugas';
        $data['data'] = $db->table('petugas')->get()->getResult();
        return view('laporan/V_laporan_petugas', $data);
    }

    public function laporan_pencaker_perkecamatan()
    {
        $db   = \Config\Database::connect();
        $id_kecamatan = $this->request->getPost('kecamatan');
        $data['kecamatan'] = $db->table('kecamatan')->getWhere(['id' => $id_kecamatan])->getRow();
        $data['judul_halaman'] = 'Laporan Data Pencaker Per Kecamatan';
        $data['data'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->where('pencaker.kecamatan',  $id_kecamatan)
            ->get()->getResult();
        return view('laporan/V_laporan_pencaker_perkecamatan', $data);
    }

    public function laporan_pencaker()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Data Pencaker Perperiode';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->where('pencaker.tanggal_daftar >=', $tanggal_awal)
            ->where('pencaker.tanggal_daftar <=', $tanggal_akhir)
            ->orderBy('pencaker.tanggal_daftar', 'desc')
            ->get()->getResult();
        return view('laporan/V_laporan_pencaker', $data);
    }

    public function laporan_terima_kerja()
    {
        $db   = \Config\Database::connect();
        $data['judul_halaman'] = 'Laporan Data Pencari Kerja Yang Sudah Diterima Bekerja';
        $tanggal_awal = $this->request->getPost('tgl_awal');
        $tanggal_akhir = $this->request->getPost('tgl_akhir');
        $data['tgl_awal'] = $tanggal_awal;
        $data['tgl_akhir'] = $tanggal_akhir;
        $data['data'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->join('detail_pekerjaan', 'detail_pekerjaan.id_pencaker=pencaker.id')
            ->where('detail_pekerjaan.tanggal>=', $tanggal_awal)
            ->where('detail_pekerjaan.tanggal<=', $tanggal_akhir)
            ->orderBy('detail_pekerjaan.tanggal', 'desc')
            ->get()->getResult();
        return view('laporan/V_laporan_terima_kerja', $data);
    }
}

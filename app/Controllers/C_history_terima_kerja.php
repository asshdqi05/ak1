<?php

namespace App\Controllers;


class C_history_terima_kerja extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $session = session();

        $data['judul_halaman'] = 'History Terima Kerja';
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
        return view('terima_kerja/V_history_terima_kerja', $data);
    }
}

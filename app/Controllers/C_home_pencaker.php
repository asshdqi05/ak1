<?php

namespace App\Controllers;

class C_home_pencaker extends BaseController
{

    public function index()
    {
        $data['session'] = session();
        $data['judul_halaman'] = 'Dashboard Pencaker';
        return view('V_home_pencaker', $data);
    }
}

<?php

namespace App\Controllers;

use App\Models\M_pendaftaran;

class C_pengajuan_ak1 extends BaseController
{

    public function index()
    {
        $db   = \Config\Database::connect();
        $session = session();

        $data['judul_halaman'] = 'Pengajuan AK1';
        $data['biodata'] = $db->table('pencaker')->select('*,pencaker.id as id_pencaker')
            ->join('kecamatan', 'kecamatan.id=pencaker.kecamatan', 'left')
            ->join('nagari', 'nagari.id=pencaker.nagari', 'left')
            ->where('pencaker.id',  $session->get('id'))
            ->get()->getRow();
        $data['berkas'] = $db->table('berkas_pencaker')->getWhere(array('id_pencaker' => $session->get('id')))->getRow();
        $data['pengajuan'] = $db->table('pengajuan_ak1')->getWhere(array('id_pencaker' => $session->get('id')))->getRow();
        return view('pengajuan_ak1/V_pengajuan_ak1', $data);
    }

    public function biodata()
    {
        $db   = \Config\Database::connect();
        $session = session();
        $data['judul_halaman'] = 'Biodata';
        $data['biodata'] = $db->table('pencaker')->getWhere(array('id' => $session->get('id')))->getRow();
        $data['kecamatan'] = $db->table('kecamatan')->get()->getResult();
        $data['nagari'] = $db->table('nagari')->get()->getResult();
        return view('pengajuan_ak1/V_biodata', $data);
    }

    public function list_nagari()
    {
        $db   = \Config\Database::connect();
        $id_kecamatan = $this->request->getVar('id_kecamatan');

        $nagari = $db->table('nagari')->getWhere(array('id_kecamatan' => $id_kecamatan))->getResult();
        $lists = "<option value=''>Pilih</option>";

        foreach ($nagari as $data) {
            $lists .= "<option value='" . $data->id . "'>" . $data->nama_nagari . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_nagari' => $lists);
        echo json_encode($callback);
    }

    public function update_biodata()
    {
        $db   = \Config\Database::connect();
        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'status_perkawinan' => $this->request->getPost('status_perkawinan'),
            'agama' => $this->request->getPost('agama'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'nagari' => $this->request->getPost('nagari'),
            'alamat' => $this->request->getPost('alamat'),
            'flag' => 2,
            'status_kerja' => "Belum Bekerja"
        ];
        $id = $this->request->getPost('id');
        $db->table('pencaker')->update($data, array('id' => $id));

        $cek_id_pencaker_berkas = $db->table('berkas_pencaker')->getWhere(['id_pencaker' => $id])->getRow();
        if ($cek_id_pencaker_berkas == "") {
            $berkas = ['id_pencaker' => $id];
            $db->table('berkas_pencaker')->insert($berkas);
        }

        $cek_id_pencaker_pengajuan = $db->table('pengajuan_ak1')->getWhere(['id_pencaker' => $id])->getRow();
        if ($cek_id_pencaker_pengajuan == "") {
            $pengajuan = ['id_pencaker' => $id];
            $db->table('pengajuan_ak1')->insert($pengajuan);
        }

        session()->setflashdata('sukses', 'Biodata Berhasil Disimpan.');
        return redirect()->to(base_url('C_pengajuan_ak1/biodata'));
    }

    public function upload_berkas()
    {
        $db   = \Config\Database::connect();
        $session = session();
        $data['judul_halaman'] = 'Biodata';
        $data['biodata'] = $db->table('pencaker')->getWhere(array('id' => $session->get('id')))->getRow();
        $data['berkas'] = $db->table('berkas_pencaker')->getWhere(array('id_pencaker' => $session->get('id')))->getRow();
        return view('pengajuan_ak1/V_berkas', $data);
    }

    public function upload_pas_foto()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'Pas Foto' => 'uploaded[pas_foto]
            |mime_in[pas_foto,image/jpg,image/jpeg,image/png,image]
            |max_size[pas_foto,1000]'
        ]);

        if ($validation == FALSE) {
            session()->setFlashdata('error', $this->validator->listErrors());
        } else {
            $upload = $this->request->getFile('pas_foto');
            $newName = $id . '_pas_foto' . $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/pas_foto/', $newName);

            $data = [
                'pas_foto' => $newName,
                'status_pas_photo' => NULL
            ];

            $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
            session()->setflashdata('sukses', 'Pas Foto Berhasil Di Upload.');
        }
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function hapus_berkas_pas_foto()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $dt = $db->table('berkas_pencaker')->getWhere(['id_pencaker' => $id])->getRow();
        $path = './file/pas_foto/';
        @unlink($path . $dt->pas_foto);
        $data = ['pas_foto' => NULL];
        $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
        session()->setflashdata('sukses', 'File Berhasil dihapus.');
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function upload_ktp()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'Pas Foto' => 'uploaded[ktp]
            |mime_in[ktp,image/jpg,image/jpeg,image/png,image]
            |max_size[ktp,1000]'
        ]);

        if ($validation == FALSE) {
            session()->setFlashdata('error', $this->validator->listErrors());
        } else {
            $upload = $this->request->getFile('ktp');
            $newName = $id . '_ktp' . $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/ktp/', $newName);

            $data = [
                'ktp' => $newName,
                'status_ktp' => NULL
            ];

            $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
            session()->setflashdata('sukses', 'Pas Foto Berhasil Di Upload.');
        }
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function hapus_berkas_ktp()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $dt = $db->table('berkas_pencaker')->getWhere(['id_pencaker' => $id])->getRow();
        $path = './file/ktp/';
        @unlink($path . $dt->ktp);
        $data = ['ktp' => NULL];
        $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
        session()->setflashdata('sukses', 'File Berhasil dihapus.');
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function upload_ijazah()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'Pas Foto' => 'uploaded[ijazah]
            |mime_in[ijazah,application/pdf]
            |max_size[ijazah,1000]'
        ]);

        if ($validation == FALSE) {
            session()->setFlashdata('error', $this->validator->listErrors());
        } else {
            $upload = $this->request->getFile('ijazah');
            $newName = $id . '_ijazah' . $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/ijazah/', $newName);

            $data = [
                'ijazah' => $newName,
                'status_ijazah' => NULL
            ];

            $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
            session()->setflashdata('sukses', 'Pas Foto Berhasil Di Upload.');
        }
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function hapus_berkas_ijazah()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $dt = $db->table('berkas_pencaker')->getWhere(['id_pencaker' => $id])->getRow();
        $path = './file/ijazah/';
        @unlink($path . $dt->ijazah);
        $data = ['ijazah' => NULL];
        $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
        session()->setflashdata('sukses', 'File Berhasil dihapus.');
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function upload_vaksin()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'Pas Foto' => 'uploaded[vaksin]
            |mime_in[vaksin,image/jpg,image/jpeg,image/png,application/pdf]
            |max_size[vaksin,1000]'
        ]);

        if ($validation == FALSE) {
            session()->setFlashdata('error', $this->validator->listErrors());
        } else {
            $upload = $this->request->getFile('vaksin');
            $newName = $id . '_vaksin' . $upload->getRandomName();
            $upload->move(WRITEPATH . '../file/vaksin/', $newName);

            $data = [
                'vaksin' => $newName,
                'status_vaksin' => NULL
            ];

            $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
            session()->setflashdata('sukses', 'Pas Foto Berhasil Di Upload.');
        }
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function hapus_berkas_vaksin()
    {
        $db   = \Config\Database::connect();
        $id = $this->request->getPost('id');
        $dt = $db->table('berkas_pencaker')->getWhere(['id_pencaker' => $id])->getRow();
        $path = './file/vaksin/';
        @unlink($path . $dt->vaksin);
        $data = ['vaksin' => NULL];
        $db->table('berkas_pencaker')->update($data, ['id_pencaker' => $id]);
        session()->setflashdata('sukses', 'File Berhasil dihapus.');
        return redirect()->to(base_url('C_pengajuan_ak1/upload_berkas'));
    }

    public function pengajuan()
    {
        $model = new M_pendaftaran();
        $db   = \Config\Database::connect();
        $data = [
            'no_pendaftaran' => $model->get_no_pendaftaran(),
            'status' => 1,
            'tipe' => 1
        ];
        $id_pencaker = $this->request->getPost('id');
        $db->table('pengajuan_ak1')->update($data, ['id_pencaker' => $id_pencaker]);
        session()->setflashdata('sukses', 'Pengajuan Kartu AK1 Berhasil. Silahkan menunggu Berkas Diverifikasi oleh Petugas.');
        return redirect()->to(base_url('C_pengajuan_ak1'));
    }

    public function perpanjang()
    {
        $db   = \Config\Database::connect();
        $data = [
            'status' => 1,
            'tipe' => 2
        ];
        $id_pencaker = $this->request->getPost('id');
        $db->table('pengajuan_ak1')->update($data, ['id_pencaker' => $id_pencaker]);
        session()->setflashdata('sukses', 'Pengajuan Perpanjangan Kartu AK1 Berhasil. Silahkan menunggu Berkas Diverifikasi oleh Petugas.');
        return redirect()->to(base_url('C_pengajuan_ak1'));
    }

    public function cetak_kartu($id_pencaker = "")
    {
        $db   = \Config\Database::connect();
        $data['data'] = $db->table('pengajuan_ak1')->select('*,pengajuan_ak1.id as id_pengajuan')
            ->join('pencaker', 'pencaker.id=pengajuan_ak1.id_pencaker', 'left')
            ->where('pengajuan_ak1.id_pencaker', $id_pencaker)
            ->get()->getRow();
        $data['berkas'] = $db->table('berkas_pencaker')->getWhere(array('id_pencaker' => $id_pencaker))->getRow();
        return view('pengajuan_ak1/V_kartu_ak1', $data);
    }
}

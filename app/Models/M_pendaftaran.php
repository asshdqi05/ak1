<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pendaftaran extends Model
{
    function get_no_pendaftaran()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_pendaftaran,4)) AS kd_max FROM pengajuan_ak1");
        $kd = "";
        if ($q->getNumRows() > 0) {
            foreach ($q->getResult() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return  date('dmY') . $kd;
    }
}

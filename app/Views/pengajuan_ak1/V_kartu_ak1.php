<html>

<head>
    <meta charset="UTF-8">
    <title>Kartu AK1</title>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>

<body onload="window.print();">
    <div align="center">
        <table class="table-warning ">
            <tr>
                <td align="center">
                    <table style="border-collapse: collapse; width: 90%;" border="0">
                        <tr>
                            <td style="width:10%">
                                <img src="<?= base_url('assets') ?>/dist/img/logo.png" width="90">
                            </td>
                            <td style="text-align: center; width: 80%;">
                                <span style="font-size: 15pt; font-weight: bold; color: black;"> Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pesisir Selatan</span><br>
                                <span style="font-size: 8pt; font-weight: bold; font-style: italic;">Jl. Rimbo Panjang Laban - Salido, Kecamatan IV Jurai - Kabupaten Pesisir Selatan</span>
                            </td>
                            <td style="width:10%">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <center>
                    <td align="center">
                        <strong>Kartu Tanda Pencari Kerja</strong>
                    </td>
                </center>

            </tr>

            <tr>
                <td align="center">
                    <br>
                    <table class="table-warning table-bordered" style="width: 90%;">
                        <tr>
                            <td colspan="2" style="width: 35%;">No Pendaftaran</td>
                            <td style="width: 1%;">:</td>
                            <td><?= $data->no_pendaftaran ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">No Induk Kependudukan</td>
                            <td>:</td>
                            <td><?= $data->nik ?></td>
                        </tr>
                        <tr>
                            <td rowspan="7"><img src="<?= base_url('file/pas_foto/' . $berkas->pas_foto); ?>" width="120px" height="150px"></td>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><?= $data->nama ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $data->jenis_kelamin ?></td>
                        </tr>
                        <tr>
                            <td>Tempat / Tanggal Lahir</td>
                            <td>:</td>
                            <td><?= $data->tempat_lahir . " / " . date('d - m - Y', strtotime($data->tanggal_lahir)) ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?= $data->status_perkawinan ?></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td><?= $data->agama ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $data->alamat ?></td>
                        </tr>
                        <tr>
                            <td>Masa Berlaku</td>
                            <td>:</td>
                            <td><?= date('d-m-Y', strtotime($data->berlaku_awal)) . " s/d " . date('d-m-Y', strtotime($data->berlaku_akhir)) ?></td>
                        </tr>


                        <tr>
                            <th align="left">
                                <br>
                                <br>
                                <br>
                                (<?= $data->nama ?>)
                            </th>
                        </tr>

                    </table>
                    <br>
                </td>
            </tr>

            <tr>
                <br>
                <br>
                <br>
                <br>

            </tr>
        </table>
    </div>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
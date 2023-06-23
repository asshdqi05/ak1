<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>


<div class="col-md-12">
    <div class="card card-olive card-outline">
        <div class="card-header">
            <a href="<?= site_url('C_laporan') ?>" class="btn btn-primary btn-flat">
                <span class="fas fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=50>
                                    <img src="<?= base_url('assets') ?>/dist/img/logo.png" width="120" alt="">
                                </td>
                                <td>
                                    <center>
                                        <h2>Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pesisir Selatan</h2>
                                        <h3>Laporan Data Pencari Kerja Yang Sudah Diterima Bekerja</h3>
                                    </center>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <div class="row">
                    <div class="col-sm-2">
                        <div class="col-sm">
                            <p>Periode </p>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="col-sm">
                            <p>:</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="col-sm">
                            <strong>
                                <p><?= date('d F Y', strtotime($tgl_awal)) ?> - <?= date('d F Y', strtotime($tgl_akhir)) ?></p>
                            </strong>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width=10>No</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Nama Perusahaan / Instansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data as $d) :
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= date('d-m-Y', strtotime($d->tanggal)) ?></td>
                                        <td><?= $d->nama ?></td>
                                        <td><?= $d->jenis_kelamin ?></td>
                                        <td><?= $d->tanggal_lahir ?></td>
                                        <td><?= $d->tempat_lahir ?></td>
                                        <td><?= $d->nama_pekerjaan ?></td>
                                        <td><?= $d->nama_perusahaan ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="col-sm">

                        </div>
                    </div>
                    <div class="col-sm float-right ">
                        <div class="col-sm">
                            <br>
                            <br>
                            <p>Pesisir Selatan, <?= date('d F Y') ?></p>
                            <p>Pimpinan</p>
                            <br>
                            <br>
                            <p>(................)</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-sm-12">
                    <button onclick="printContent('div1')" class="btn btn-primary float-right"><i class="fa fa-print"></i>Cetak</button>
                </div>

            </div>

        </div>
    </div>
</div>


<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>

<?= $this->endSection() ?>
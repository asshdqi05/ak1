<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-olive">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-user text-olive"></i> Biodata
                </h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>NIK</th>
                        <th>:</th>
                        <th><?= $biodata->nik ?></th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th><?= $biodata->nama ?></th>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <th>:</th>
                        <th><?= $biodata->jenis_kelamin ?></th>
                    </tr>
                    <tr>
                        <th>Tempat / Tanggal Lahir</th>
                        <th>:</th>
                        <th><?= $biodata->tempat_lahir ?> / <?= date('d F Y', strtotime($biodata->tanggal_lahir)) ?></th>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <th>:</th>
                        <th><?= $biodata->status_perkawinan ?></th>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <th>:</th>
                        <th><?= $biodata->agama ?></th>
                    </tr>
                    <tr>
                        <th>No Telepon / HP</th>
                        <th>:</th>
                        <th><?= $biodata->no_telepon ?></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th>:</th>
                        <th><?= $biodata->email ?></th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <th><?= $biodata->alamat ?></th>
                    </tr>
                    <tr>
                        <th>Kecamatan</th>
                        <th>:</th>
                        <th><?= $biodata->nama_kecamatan ?></th>
                    </tr>
                    <tr>
                        <th>Nagari</th>
                        <th>:</th>
                        <th><?= $biodata->nama_nagari ?></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm">
        <div class="card card-outline card-olive">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-briefcase text-olive"></i> Riwayat Pekerjaan
                </h1>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Pekerjaan</th>
                        <th>Nama Perusahaan / Instansi</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                    <?php if (!$kerja) { ?>
                        <tr>
                            <th colspan="3" class="text-center">
                                <h2> Belum Bekerja </h2>
                            </th>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($kerja as $k) { ?>
                            <tr>
                                <td> <?= $k->nama_pekerjaan ?></td>
                                <td> <?= $k->nama_perusahaan ?></td>
                                <td> <?= $k->tanggal ?></td>
                            </tr>
                    <?php }
                    } ?>
                </table>
            </div>
        </div>

    </div>

</div>



<?= $this->endSection() ?>
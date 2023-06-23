<?= $this->extend('template_pencaker/V_main') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-olive">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-user text-olive"></i> Biodata
                </h1>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="<?= site_url('C_pengajuan_ak1/biodata') ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Update Biodata</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($biodata->flag == 1) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-times-circle"></i> Biodata Belum Lengkap!</h5>
                        Silahkan Lengkapi Biodata untuk lanjut ke tahap upload berkas.
                    </div>
                <?php } else if ($biodata->flag == 2) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check-circle"></i> Biodata Sudah Lengkap!</h5>
                    </div>
                <?php } ?>
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

    <div class="col-md-6">
        <div class="card card-outline card-olive">
            <?php if ($biodata->flag == 1) { ?>
                <div class="overlay">
                    <i class="fas fa-3x fa-times-circle text-danger"></i> Lengkapi Biodata Terlebih Dahulu!
                </div>
            <?php } ?>
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-file-upload text-olive"></i> Berkas
                </h1>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a href="<?= site_url('C_pengajuan_ak1/upload_berkas') ?>" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Berkas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php
                if ($berkas->pas_foto == "" || $berkas->ktp == "" || $berkas->ijazah == "" || $berkas->vaksin == "") { ?>

                <?php } else { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check-circle"></i> Berkas Sudah Lengkap!</h5>
                    </div>
                <?php } ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Pas Foto</th>
                        <th>
                            <?php if ($berkas->pas_foto == "") { ?>
                                <i class="fas fa-times text-danger"></i>
                            <?php  } else { ?>
                                <i class="fas fa-check text-success"></i>
                            <?php  } ?>
                        </th>
                        <?php if ($berkas->status_pas_photo == "ditolak") { ?>
                            <th>
                                Pas Foto Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_pas_photo ?>"
                            </th>
                        <?php } else { ?>
                            <th></th>
                        <?php  } ?>
                    </tr>
                    <tr>
                        <th>KTP</th>
                        <th>
                            <?php if ($berkas->ktp == "") { ?>
                                <i class="fas fa-times text-danger"></i>
                            <?php  } else { ?>
                                <i class="fas fa-check text-success"></i>
                            <?php  } ?>
                        </th>
                        <?php if ($berkas->status_ktp == "ditolak") { ?>
                            <th>
                                KTP Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_ktp ?>"
                            </th>
                        <?php } else { ?>
                            <th></th>
                        <?php  } ?>
                    </tr>
                    <tr>
                        <th>Ijazah</th>
                        <th>
                            <?php if ($berkas->ijazah == "") { ?>
                                <i class="fas fa-times text-danger"></i>
                            <?php  } else { ?>
                                <i class="fas fa-check text-success"></i>
                            <?php  } ?>
                        </th>
                        <?php if ($berkas->status_ijazah == "ditolak") { ?>
                            <th>
                                Ijazah Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_ijazah ?>"
                            </th>
                        <?php } else { ?>
                            <th></th>
                        <?php  } ?>
                    </tr>
                    <tr>
                        <th>Sertifikat Vaksin</th>
                        <th>
                            <?php if ($berkas->vaksin == "") { ?>
                                <i class="fas fa-times text-danger"></i>
                            <?php  } else { ?>
                                <i class="fas fa-check text-success"></i>
                            <?php  } ?>
                        </th>
                        <?php if ($berkas->status_vaksin == "ditolak") { ?>
                            <th>
                                Sertifikat Vaksin Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_vaksin ?>"
                            </th>
                        <?php } else { ?>
                            <th></th>
                        <?php  } ?>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card card-outline card-olive">
            <?php if ($biodata->flag == 1 || 2 && $berkas->pas_foto == "" || $berkas->ktp == "" || $berkas->ijazah == "" || $berkas->vaksin == "") { ?>
                <div class="overlay">
                    <i class="fas fa-3x fa-times-circle text-danger"></i> Lengkapi Biodata dan Berkas Terlebih Dahulu!
                </div>
            <?php } ?>
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-laptop-house text-olive"></i> Pengajuan AK1
                </h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($pengajuan->status == 1) { ?>
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i> Berkas Anda Sedang Diperiksa Petugas. Silahkan Menunggu.</h5>
                    </div>
                <?php } else if ($pengajuan->status == 2) { ?>
                    <?php if ($pengajuan->berlaku_akhir > date('Y-m-d')) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <h5><i class="icon fas fa-check-circle"></i> Pengajuan AK1 Berhasil.Silahkan Cetak Kartu AK1 Pada Tombol Dibawah ini.</h5>
                        </div>
                        <a class="btn btn-block btn-success" href="<?= site_url('C_pengajuan_ak1/cetak_kartu/') . $pengajuan->id_pencaker ?>" target="_blank"><i class="fas fa-print"></i> Cetak Kartu AK1</a>
                    <?php } else { ?>
                        <div class="alert alert-info alert-dismissible">
                            <h5><i class="icon fas fa-info-circle"></i> Masa Berlaku Kartu AK1 Anda sudah habis. Silahkan perpanjang masa berlaku.</h5>
                        </div>
                        <button type="button" data-toggle="modal" data-target="#confirm_perpanjang" class="btn btn-block btn-info"><i class="fas fa-file-import"></i> Perpanjang Masa Berlaku</button>
                    <?php } ?>

                <?php } else { ?>
                    <button type="button" data-toggle="modal" data-target="#confirm" class="btn btn-block btn-primary"><i class="fas fa-laptop-house"></i> Ajukan AK1</button>
                <?php } ?>
            </div>
        </div>

    </div>

</div>


<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perhatian!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan_ak1/pengajuan') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Apakah Data yang anda masukan sudah benar?</span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perhatian!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan_ak1/perpanjang') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Apakah Data yang anda masukan sudah benar?</span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
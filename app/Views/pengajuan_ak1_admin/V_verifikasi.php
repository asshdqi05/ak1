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

    <div class="col-md-6">
        <div class="card card-outline card-olive">
            <div class="card-header">
                <h1 class="card-title">
                    <i class="fas fa-file-upload text-olive"></i> Berkas
                </h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Pas Foto</th>
                        <?php if ($berkas->status_pas_photo == "ditolak") { ?>
                            <th>
                                Pas Foto Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_pas_photo ?>"
                            </th>
                        <?php } else { ?>
                            <th>
                                <a class="btn btn-success" href="<?= base_url('file/pas_foto/' . $berkas->pas_foto); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                                <a data-toggle="modal" data-target="#tolak_foto" class="btn btn-danger"><i class="fas fa-ban"></i> Tolak</a>
                            </th>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>KTP</th>
                        <?php if ($berkas->status_ktp == "ditolak") { ?>
                            <th>
                                KTP Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_ktp ?>"
                            </th>
                        <?php } else { ?>
                            <th>
                                <a class="btn btn-success" href="<?= base_url('file/ktp/' . $berkas->ktp); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                                <a data-toggle="modal" data-target="#tolak_ktp" class="btn btn-danger"><i class="fas fa-ban"></i> Tolak</a>
                            </th>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th>Ijazah</th>
                        <?php if ($berkas->status_ijazah == "ditolak") { ?>
                            <th>
                                Ijazah Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_ijazah ?>"
                            </th>
                        <?php } else { ?>
                            <th>
                                <a class="btn btn-success" href="<?= base_url('file/ijazah/' . $berkas->ijazah); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                                <a data-toggle="modal" data-target="#tolak_ijazah" class="btn btn-danger"><i class="fas fa-ban"></i> Tolak</a>
                            </th>
                        <?php } ?>

                    </tr>
                    <tr>
                        <th>Sertifikat Vaksin</th>
                        <?php if ($berkas->status_vaksin == "ditolak") { ?>
                            <th>
                                Vaksin Ditolak <i class="fas fa-ban text-danger"></i> : "<?= $berkas->ctt_tolak_vaksin ?>"
                            </th>
                        <?php } else { ?>
                            <th>
                                <a class="btn btn-success" href="<?= base_url('file/vaksin/' . $berkas->vaksin); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                                <a data-toggle="modal" data-target="#tolak_vaksin" class="btn btn-danger"><i class="fas fa-ban"></i> Tolak</a>
                            </th>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card card-outline card-olive">
            <div class="card-body">
                <?php if ($berkas->status_pas_photo == "" && $berkas->status_ktp == "" && $berkas->status_ijazah == "" && $berkas->status_vaksin == "") { ?>
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#confirm"><i class="fas fa-check-double"></i> Verifikasi Data & Terbitkan Kartu AK1</button>
                <?php  } ?>
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
            <form method="POST" action="<?php echo site_url('C_pengajuan/konfirmasi_verifikasi') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Apakah Anda yakin?</span></strong>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Ya</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Pas Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan/tolak_berkas_pas_foto') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_berkas" id="" value="<?= $berkas->id ?>">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Catatan Tolak:</span></strong>
                    <textarea class="form-control" rows="4" name="ctt_tolak_pas_photo" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Tolak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_ktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak ktp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan/tolak_berkas_ktp') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_berkas" id="" value="<?= $berkas->id ?>">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Catatan Tolak:</span></strong>
                    <textarea class="form-control" rows="4" name="ctt_tolak" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Tolak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_ijazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak ijazah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan/tolak_berkas_ijazah') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_berkas" id="" value="<?= $berkas->id ?>">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Catatan Tolak:</span></strong>
                    <textarea class="form-control" rows="4" name="ctt_tolak" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Tolak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_vaksin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Sertifikat Vaksin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan/tolak_berkas_vaksin') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_berkas" id="" value="<?= $berkas->id ?>">
                    <input type="hidden" name="id" id="" value="<?= $biodata->id_pencaker ?>">
                    <strong><span>Catatan Tolak:</span></strong>
                    <textarea class="form-control" rows="4" name="ctt_tolak" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Tolak</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->extend('template_pencaker/V_main') ?>
<?= $this->section('content') ?>

<div class="col-md">
    <div class="card card-outline card-olive">
        <div class="card-header">
            <h1 class="card-title">
                <i class="fas fa-upload text-olive"></i> Upload Berkas
            </h1>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a href="<?= site_url('C_pengajuan_ak1') ?>" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- pas foto -->
            <form action="<?= site_url("C_pengajuan_ak1/upload_pas_foto") ?>" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="id" class="form-control" value="<?= $biodata->id ?>" required>
                <div class="form-group">
                    <label for="exampleInputFile">Pas Foto</label>
                    <?php if ($berkas->pas_foto == "") { ?>
                        <div class="input-group row">
                            <div class="custom-file col-sm-6">
                                <input type="file" name="pas_foto" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Upload</button>
                            </div>
                        </div>
                        <span class="text-danger"><strong>*File tipe :jpeg,jpg,png. Maksimal Ukuran File 1MB.</strong></span>
                    <?php } else { ?>
                        <span class="text-success"><strong>File Sudah Diupload.</strong></span>
                        <div class="col-sm">
                            <a class="btn btn-success" href="<?= base_url('file/pas_foto/' . $berkas->pas_foto); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="hapus('<?= $biodata->id ?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    <?php } ?>
                </div>
            </form>

            <!-- ktp -->
            <form action="<?= site_url("C_pengajuan_ak1/upload_ktp") ?>" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="id" class="form-control" value="<?= $biodata->id ?>" required>
                <div class="form-group">
                    <label for="exampleInputFile">KTP</label>
                    <?php if ($berkas->ktp == "") { ?>
                        <div class="input-group row">
                            <div class="custom-file col-sm-6">
                                <input type="file" name="ktp" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Upload</button>
                            </div>
                        </div>
                        <span class="text-danger"><strong>*File tipe :jpeg,jpg,png. Maksimal Ukuran File 1MB.</strong></span>
                    <?php } else { ?>
                        <span class="text-success"><strong>File Sudah Diupload.</strong></span>
                        <div class="col-sm">
                            <a class="btn btn-success" href="<?= base_url('file/ktp/' . $berkas->ktp); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="hapus_ktp('<?= $biodata->id ?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    <?php } ?>
                </div>
            </form>

            <!-- ijazah -->
            <form action="<?= site_url("C_pengajuan_ak1/upload_ijazah") ?>" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="id" class="form-control" value="<?= $biodata->id ?>" required>
                <div class="form-group">
                    <label for="exampleInputFile">Ijazah</label>
                    <?php if ($berkas->ijazah == "") { ?>
                        <div class="input-group row">
                            <div class="custom-file col-sm-6">
                                <input type="file" name="ijazah" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Upload</button>
                            </div>
                        </div>
                        <span class="text-danger"><strong>*File tipe :PDF. Maksimal Ukuran File 1MB.</strong></span>
                    <?php } else { ?>
                        <span class="text-success"><strong>File Sudah Diupload.</strong></span>
                        <div class="col-sm">
                            <a class="btn btn-success" href="<?= base_url('file/ijazah/' . $berkas->ijazah); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="hapus_ijazah('<?= $biodata->id ?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    <?php } ?>
                </div>
            </form>

            <!-- serifikat vaksin -->
            <form action="<?= site_url("C_pengajuan_ak1/upload_vaksin") ?>" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="id" class="form-control" value="<?= $biodata->id ?>" required>
                <div class="form-group">
                    <label for="exampleInputFile">Sertifikat Vaksin</label>
                    <?php if ($berkas->vaksin == "") { ?>
                        <div class="input-group row">
                            <div class="custom-file col-sm-6">
                                <input type="file" name="vaksin" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Upload</button>
                            </div>
                        </div>
                        <span class="text-danger"><strong>*File tipe :PDF,jpeg,jpg,png. Maksimal Ukuran File 1MB.</strong></span>
                    <?php } else { ?>
                        <span class="text-success"><strong>File Sudah Diupload.</strong></span>
                        <div class="col-sm">
                            <a class="btn btn-success" href="<?= base_url('file/vaksin/' . $berkas->vaksin); ?>" target="_blank"><i class="fas fa-eye"></i> Lihat File</a>
                            <a class="btn btn-danger" href="javascript:void(0)" onclick="hapus_vaksin('<?= $biodata->id ?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    <?php } ?>
                </div>
            </form>

        </div>
    </div>
</div>



<script>
    function hapus(id) {
        $('#hid').val(id);
        $('#hapus_data').modal('show');
    }

    function hapus_ktp(id) {
        $('#hidktp').val(id);
        $('#hapus_data_ktp').modal('show');
    }

    function hapus_ijazah(id) {
        $('#hidijazah').val(id);
        $('#hapus_data_ijazah').modal('show');
    }

    function hapus_vaksin(id) {
        $('#hidvaksin').val(id);
        $('#hapus_data_vaksin').modal('show');
    }
</script>


<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan_ak1/hapus_berkas_pas_foto') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id=""></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data_ktp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Berkas KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan_ak1/hapus_berkas_ktp') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hidktp">
                    Anda yakin hapus brtkas <strong><span id=""></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data_ijazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data ijazah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan_ak1/hapus_berkas_ijazah') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hidijazah">
                    Anda yakin hapus data <strong><span id=""></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data_vaksin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data vaksin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_pengajuan_ak1/hapus_berkas_vaksin') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hidvaksin">
                    Anda yakin hapus data <strong><span id=""></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
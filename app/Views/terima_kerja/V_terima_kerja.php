<?= $this->extend('template_pencaker/V_main') ?>
<?= $this->section('content') ?>
<div class="alert alert-info alert-dismissible">
    <h5><i class="icon fas fa-info-circle"></i> Silahkan isi Form dibawah jika anda sudah Berkerja.</h5>
</div>
<div class="col-md">
    <div class="card card-outline card-olive">
        <div class="card-header">
            <h1 class="card-title">
                <i class="fas fa-user text-olive"></i> Pekerjaan
            </h1>
        </div>
        <!-- /.card-header -->


        <?php
        $db   = \Config\Database::connect();
        $ker = $db->table('detail_pekerjaan')->getWhere(array('id_pencaker' => $biodata->id_pencaker))->getRow();
        ?>


        <div class="card-body">
            <form action="<?= site_url("C_terima_kerja/save_pekerjaan") ?>" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label>Nama Perkerjaan</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $biodata->id_pencaker ?>" required>
                    <input type="text" name="nama_pekerjaan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Perusahaan / Instansi</label>
                    <input type="text" name="nama_perusahaan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Diterima Bekerja</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h3>List Pekerjaan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Pekerjaan</th>
                    <th>Nama Perusahaan / Instansi</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
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
                            <td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit<?= $k->id ?>"><i class="fas fa-edit"></i></a>
                                <a data-toggle="modal" data-target="#modal_delete<?= $k->id ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </table>
        </div>
    </div>
</div>


<?php foreach ($kerja as $k) { ?>
    <div id="modal_edit<?= $k->id ?>" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="<?= site_url("C_terima_kerja/update_pekerjaan") ?>" method="post" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Perkerjaan</label>
                                <input type="hidden" name="id" class="form-control" value="<?= $k->id ?>" required>
                                <input type="hidden" name="id_pencaker" class="form-control" value="<?= $biodata->id_pencaker ?>" required>
                                <input type="text" name="nama_pekerjaan" class="form-control" value="<?= $k->nama_pekerjaan ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan / Instansi</label>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?= $k->nama_perusahaan ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Diterima Bekerja</label>
                                <input type="date" name="tanggal" value="<?= $k->tanggal ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button class="btn btn-block btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($kerja as $k) { ?>
    <div id="modal_delete<?= $k->id ?>" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="<?= site_url('C_terima_kerja/hapus_pekerjaan') ?>" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $k->id ?>">
                        <span>
                            <h5 class="text-gray-900">Apakah Anda Yakin Menghapus Data : <strong><?= $k->nama_pekerjaan ?></strong>?</h5>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Confirm</button>
                        <button type="button" class="btn btn-secondary" aria-hidden="true" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>


<?= $this->endSection() ?>
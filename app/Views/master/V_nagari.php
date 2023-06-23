<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal_add">
                    <span class="fas fa-plus"></span>
                    Tambah Data
                </button>

            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama Nagari</th>
                        <th>Nama Kecamatan</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->nama_nagari ?></td>
                                <td><?= $d->nama_kecamatan ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-sm btn-success" href="javascript:void(0)" onclick="edit( 
                                                                                '<?= $d->id_nagari ?>', 
                                                                                '<?= $d->id_kecamatan ?>',
                                                                                '<?= $d->nama_nagari ?>',
                                                                               )">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_nagari ?>','<?= $d->nama_nagari ?>')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function edit(id, id_kecamatan, nama) {
        $('#id').val(id);
        $('#id_kecamatan').val(id_kecamatan);
        $('#nama').val(nama);
        $('#edit_data').modal('show');
    }

    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data Nagari</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_nagari/save') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="id_kecamatan" class="form-control">
                            <option selected disabled>PILIH</option>
                            <?php foreach ($kecamatan as $d) { ?>
                                <option value="<?= $d->id ?>"><?= $d->nama_kecamatan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama nagari</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_nagari/edit') ?>">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                                <option selected disabled>PILIH</option>
                                <?php foreach ($kecamatan as $d) { ?>
                                    <option value="<?= $d->id ?>"><?= $d->nama_kecamatan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Nagari</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_nagari/delete') ?>">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hid">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
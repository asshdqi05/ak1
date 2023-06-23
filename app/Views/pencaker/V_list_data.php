<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <form method="POST" action="<?= site_url('C_pencaker') ?>">
                    <div class="row">
                        <div class="form-horizontal col-4">
                            <label for="">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tgl_awal" required>
                        </div>
                        <div class="form-horizontal col-4">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tgl_akhir" required>
                        </div>
                        <div class="form-horizontal col-2">
                            <label for="">-</label>
                            <br>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Alamat</th>
                        <th>No telepon</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->jenis_kelamin ?></td>
                                <td><?= $d->tanggal_lahir ?></td>
                                <td><?= $d->tempat_lahir ?></td>
                                <td><?= $d->alamat ?></td>
                                <td><?= $d->no_telepon ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-sm btn-info" href="<?= site_url('C_pencaker/detail/') . $d->id_pencaker ?>">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="hapus('<?= $d->id_pencaker ?>','<?= $d->nama ?>')">
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
    function hapus(id, nama) {
        $('#hid').val(id);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
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
            <form method="POST" action="<?php echo site_url('C_pencaker/delete') ?>">
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
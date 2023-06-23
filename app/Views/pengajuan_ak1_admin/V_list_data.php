<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Data
            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>No Pendaftaran</th>
                        <th>Nama Pencaker</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) {
                            if ($d->status == 1) {
                                $status = "Belum Diverifikasi";
                            } else  if ($d->status == 2) {
                                $status = "Sudah Diverifikasi";
                            }
                            if ($d->tipe == 1) {
                                $ket = "Buat Kartu Baru";
                            } else  if ($d->tipe == 2) {
                                $ket = "Perpanjang Masa Berlaku Kartu";
                            }

                        ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?= $d->no_pendaftaran ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $ket ?></td>
                                <td><?= $status ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-sm btn-info" href="<?= site_url('C_pengajuan/verifikasi/') . $d->id_pencaker ?>">
                                        <i class="fas fa-tasks"></i> Verifikasi
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



<?= $this->endSection() ?>
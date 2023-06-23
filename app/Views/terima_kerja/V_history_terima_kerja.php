<?= $this->extend('template_pencaker/V_main') ?>
<?= $this->section('content') ?>

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

<?= $this->endSection() ?>
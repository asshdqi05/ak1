<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>


<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h1 class="card-title">
                <h3>Selamat Datang </h3>
            </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="alert bg-olive alert-dismissible">
                <center>
                    <img src="<?= base_url('assets') ?>/dist/img/logo.png" width="200" alt="">
                    <strong>
                        <h1>Sistem Informasi AK1</h1>
                    </strong>
                    <h4>Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pesisir Selatan</h4>
                </center>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<?= $this->endSection() ?>
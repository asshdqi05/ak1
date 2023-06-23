<?= $this->extend('template/V_main') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card card-olive card-outline">
            <div class="card-body">
                <div class="row no-gutters">


                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_petugas') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-olive">
                                                <div class="card-title">Laporan Data Petugas</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-gray"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>


                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_pencaker_perkecamatan') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-olive">
                                                <div class="card-title">Laporan Data Pencaker Perkecamatan</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <select name="kecamatan" class="form-control" required>
                                                        <option disabled selected value="">PILIH KECAMATAN</option>
                                                        <?php foreach ($kecamatan as $d) : ?>
                                                            <option value="<?= $d->id ?>"><?= $d->nama_kecamatan ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-gray"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>


                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_pencaker') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-olive">
                                                <div class="card-title">Laporan Pencaker Perperiode</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" name="tgl_awal" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" name="tgl_akhir" class="form-control" required>
                                                </div>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-gray"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>


                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('C_laporan/laporan_terima_kerja') ?>">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header bg-olive">
                                                <div class="card-title">Laporan Data Pencari Kerja Yang Sudah Diterima Bekerja</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>Tanggal Awal</label>
                                                    <input type="date" name="tgl_awal" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Akhir</label>
                                                    <input type="date" name="tgl_akhir" class="form-control" required>
                                                </div>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block bg-gray"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
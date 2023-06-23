<?= $this->extend('template_pencaker/V_main') ?>
<?= $this->section('content') ?>

<div class="col-md">
    <div class="card card-outline card-olive">
        <div class="card-header">
            <h1 class="card-title">
                <i class="fas fa-user text-olive"></i> Biodata
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
            <form action="<?= site_url("C_pengajuan_ak1/update_biodata") ?>" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $biodata->id ?>" required>
                    <input type="number" name="nik" class="form-control" value="<?= $biodata->nik ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $biodata->nama ?>" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" value="<?= $biodata->jenis_kelamin ?>" required>
                        <option disabled value="">Pilih</option>
                        <option value="Laki-laki" <?= ($biodata->jenis_kelamin == "Laki-laki") ? 'selected' : '' ?>>Laki-Laki</option>
                        <option value="Perempuan" <?= ($biodata->jenis_kelamin == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?= $biodata->tempat_lahir ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?= $biodata->tanggal_lahir ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>No Telepon / HP</label>
                        <input type="text" name="no_telepon" class="form-control" value="<?= $biodata->no_telepon ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $biodata->email ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Status Perkawinan</label>
                    <select name="status_perkawinan" class="form-control" value="<?= $biodata->status_perkawinan ?>" required>
                        <option disabled value="">Pilih</option>
                        <option value="Belum Menikah" <?= ($biodata->status_perkawinan == "Belum Menikah") ? 'selected' : '' ?>>Belum Menikah</option>
                        <option value="Menikah" <?= ($biodata->status_perkawinan == "Menikah") ? 'selected' : '' ?>>Menikah</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" class="form-control" value="<?= $biodata->agama ?>" required>
                        <option disabled value="">Pilih</option>
                        <option value="Islam" <?= ($biodata->agama == "Islam") ? 'selected' : '' ?>>Islam</option>
                        <option value="Protestan" <?= ($biodata->agama == "Protestan") ? 'selected' : '' ?>>Protestan</option>
                        <option value="Katolik" <?= ($biodata->agama == "Katolik") ? 'selected' : '' ?>>Katolik</option>
                        <option value="Hindu" <?= ($biodata->agama == "Hindu") ? 'selected' : '' ?>>Hindu</option>
                        <option value="Buddha" <?= ($biodata->agama == "Buddha") ? 'selected' : '' ?>>Buddha</option>
                        <option value="Khonghucu" <?= ($biodata->agama == "Khonghucu") ? 'selected' : '' ?>>Khonghucu</option>
                    </select>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control" id="kecamatan" value="<?= $biodata->kecamatan ?>" required>
                            <option disabled value="">Pilih</option>
                            <?php foreach ($kecamatan as $d) {  ?>
                                <option value="<?= $d->id ?>" <?= ($d->id ==  $biodata->kecamatan) ? 'selected' : '' ?>><?= $d->nama_kecamatan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nagari</label>
                        <select name="nagari" class="form-control" id="nagari" value="<?= $biodata->nagari ?>" required>
                            <?php foreach ($nagari as $d) {  ?>
                                <option value="<?= $d->id ?>" <?= ($d->id ==  $biodata->nagari) ? 'selected' : '' ?>><?= $d->nama_nagari ?></option>
                            <?php } ?>
                        </select>
                        <div id="loading" style="margin-top: 15px;">
                            <small><i class="fas fa-sync-alt fa-spin"></i> Loading</small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control" required><?= $biodata->alamat ?></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-block btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- jQuery -->
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>

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


    $(document).ready(function() {
        $("#loading").hide();
        // $("#nagari").prop("disabled", true);
        $("#kecamatan").change(function() {

            $("#blok").hide();
            $("#loading").show();


            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("C_pengajuan_ak1/list_nagari"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_kecamatan: $("#kecamatan").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#loading").hide();
                    $("#nagari").prop("disabled", false);
                    $("#nagari").html(response.list_nagari).show();

                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>


<?= $this->endSection() ?>
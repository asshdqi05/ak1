<div class="container">


    <div class="section-title">
        <h2>Registrasi Akun</h2>
        <p>Form Registrasi AKun</p>
    </div>
    <form action="<?= site_url("C_front/registrasi") ?>" method="post" class="needs-validation" role="form" novalidate>
        <div class="form-group mt-3">
            <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group mt-3">
            <input type="number" class="form-control" name="nik" id="nik" placeholder="NIK" required>
            <span id="pesan"></span>
        </div>
        <div class="form-group mt-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="my-3">

        </div>
        <div class="text-center"><button type="submit" class="btn btn-block btn-primary">Registrasi</button></div>
    </form>
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
        $('#nik').blur(function() {
            $('#pesan').html('<i class="fas fa-circle-notch fa-spin text-warning"></i>');
            var nik = $(this).val();

            $.ajax({
                type: 'POST',
                url: 'C_front/cek_nik',
                data: 'nik=' + nik,
                success: function(data) {
                    $('#pesan').html(data);
                }
            })

        });
    });
</script>
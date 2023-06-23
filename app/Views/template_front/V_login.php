<div class="container">

    <div class="section-title">
        <h2>Login Akun</h2>
        <p>Login</p>
    </div>

    <form action="<?= site_url("C_front/login") ?>" method="post" class="needs-validation" role="form" novalidate>

        <div class="form-group mt-3">
            <input type="number" class="form-control" name="nik" id="us" placeholder="NIK" required>
        </div>
        <div class="form-group mt-3">
            <input type="password" class="form-control" name="password" id="pw" placeholder="Password" required>
        </div>
        <div class="my-3">

        </div>
        <div class="text-center"><button type="submit" class="btn btn-lg btn-primary">Log in</button></div>
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
</script>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h1 class="my-5">Registro de Cliente</h1>

        <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
            <?php echo form_open('do_client_register'); ?>
            <div class="col">
                <label for="full_name" class="form-label">Nombre completo</label>
                <input type="text" name="full_name" class="form-control" id="full_name" required>
            </div>
            <div class="col mt-2">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" name="dni" class="form-control" id="dni" required>
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="col mt-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="col mt-4">
                <button type="submit" name="submit" class="btn btn-success">Registrarse</button>
            </div>
            <?php echo form_close(); ?>
            <?php if (isset($error_message)) : ?>
                <div class="alert alert-danger p-2 m-0" role="alert">
                    <p class="text-center m-0 text-dark fs-5"><?php echo $error_message; ?></p>
                </div>
            <?php endif ?>
        </div>
    </div>

</body>

</html>
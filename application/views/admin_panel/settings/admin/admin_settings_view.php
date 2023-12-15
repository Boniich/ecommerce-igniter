<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container">
        <div class="my-5">
            <h1 class="text-center">Ajustes - Perfil</h1>
        </div>

        <div class="container d-flex flex-column justify-content-center align-items-center">

            <div class="mb-5">
                <a href="#">Perfil</a>
                <a href="#">Contraseña</a>
            </div>

            <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
                <?php echo form_open('do_client_register'); ?>
                <div class="col mb-3">
                    <img src="../assets/amd.jpg" height="100" alt="..." class="rounded-circle" width="100">
                    <input type="file" name="profile_image" accept="image/png, image/jpeg" />
                </div>
                <div class="col mb-3">
                    <label for="full_name" class="form-label">Nombre completo</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" required>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="col mt-4">
                    <button type="submit" name="submit" class="btn btn-success">Actualizar</button>
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
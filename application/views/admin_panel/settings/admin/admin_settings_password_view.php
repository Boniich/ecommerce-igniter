<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container">
        <div class="my-5">
            <h1 class="text-center">Ajustes - Contraseña</h1>
        </div>

        <div class="container d-flex flex-column justify-content-center align-items-center">

            <div class="mb-5">
                <a href="<?php echo base_url('admin_settings/profile'); ?>" class="btn btn-outline-primary">Perfil</a>
                <a href="<?php echo base_url('admin_settings/password'); ?>" class="btn btn-outline-primary">Contraseña</a>
            </div>

            <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
                <?php echo form_open('admin_settings/password/update_admin_password'); ?>
                <div class="col mb-3">
                    <label for="full_name" class="form-label">Contraseña actual</label>
                    <input type="text" name="old_password" class="form-control" id="full_name" required>
                </div>
                <div class="col mb-3">
                    <label for="full_name" class="form-label">Nueva contraseña</label>
                    <input type="text" name="new_password" class="form-control" id="full_name" required>
                </div>
                <div class="col mb-3">
                    <label for="full_name" class="form-label">Repite nueva contraseña</label>
                    <input type="text" name="confirm_new_password" class="form-control" id="full_name" required>
                </div>
                <div class="col mt-4">
                    <button type="submit" name="submit" class="btn btn-success">Cambiar contraseña</button>
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
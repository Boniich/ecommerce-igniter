<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h1 class="my-5">Admin Login</h1>

        <div class="w-50 bg-light shadow p-3 mb-5 bg-body rounded border border-secondary rounded-3">
            <?php echo form_open('do_admin_login'); ?>
            <div class="col">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col mt-2">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col mt-4">
                <button type="submit" name="submit" class="btn btn-success">Login in</button>
            </div>
            <?php echo form_close(); ?>
            <p class="text-danger text-center fs-4 my-0">
                <?php if (isset($error_message)) {
                    echo $error_message;
                } ?></p>
        </div>
    </div>

</body>

</html>
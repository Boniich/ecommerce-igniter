<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<header>
    <nav class="navbar-dark bg-dark p-2">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <p class="m-0 text-light">Ecommerce Igniter 🔥</p>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('products'); ?>">Products</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Mi Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mis ordenes</a>
                </li> -->
            </ul>
            <div>
                <div class="dropdown">
                    <button class="d-flex justify-content-center align-items-center gap-2 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php foreach ($client as $data) : ?>
                            <img src="<?php echo base_url('./assets/image-profile.png'); ?>" class="rounded-circle" width="35" height="35"></img>
                            <p class="m-0"><?php echo $data['full_name']; ?></p>
                        <?php endforeach; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Ajustes</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('logout_client'); ?>">Salir</a></li>
                    </ul>
                </div>

            </div>
        </div>
        </div>
    </nav>
</header>
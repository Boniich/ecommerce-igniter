<header>
    <nav class="navbar-dark bg-dark p-2">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <p class="m-0 text-light">Ecommerce Igniter 🔥</p>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="<?php echo base_url('/'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="<?php echo base_url('products'); ?>">Productos</a>
                </li>
            </ul>
            <div>
                <ul class="nav bg-dark nav-expand-lg justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="<?php echo base_url('client_login') ?>">Ingresar como Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo base_url('client_register') ?>">Registrarse como Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning" href="<?php echo base_url('admin_login') ?>">Ingresar como Admin</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
</header>
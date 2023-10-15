<header>
    <nav class="navbar-dark bg-dark p-2">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <p class="m-0 text-light">Ecommerce Igniter 🔥</p>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('products'); ?>">Products</a>
                </li>
            </ul>
            <div>
                <ul class="nav bg-dark nav-expand-lg justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo base_url('client_login') ?>">Login clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('client_register') ?>">Register Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning" href="<?php echo base_url('admin_login') ?>">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
</header>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row mt-5">
        <?php foreach ($product as $item) : ?>
            <div class="col-sm-4">
                <?php if ($item['image'] == NULL || $item['image'] == '') {
                    $image = './assets/not-image.png';
                } else {
                    $image = './uploads/' . $item['image'];
                } ?>
                <img src="<?php echo base_url($image); ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-sm">
                <!-- <p>Marca</p> -->
                <h3><?php echo $item['name'] ?></h3>
                <p><?php echo $item['description'] ?></p>
                <p>Cantidad disponible: <?php echo $item['stock'] ?></p>
                <p class="text-dark fs-3"><b>$<?php echo $item['price'] ?></b></p>
                <?php if (!$this->session->login_in) : ?>
                    <div class="alert alert-info" role="alert">
                        Debes Iniciar session para comprar
                    </div>
                <?php elseif ($this->session->login_in && $this->session->role === 'client') : ?>
                    <button class="btn btn-primary">Agregar al carrito</button>
                <?php elseif ($this->session->login_in && $this->session->role === 'admin') : ?>
                    <div class="alert alert-warning" role="alert">
                        Lo sentimos. Los administradores <b>NO PUEDEN COMPRAR</b>
                    </div>
                <?php endif ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</body>

</html>
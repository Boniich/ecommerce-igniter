<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
    <div class="row">
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
                <p>Marca</p>
                <h3><?php echo $item['name'] ?></h3>
                <p><?php echo $item['description'] ?></p>
                <p>Cantidad disponible: <?php echo $item['stock'] ?></p>
                <p>$<?php echo $item['price'] ?></p>
                <?php if (!$this->session->login_in) : ?>
                    <p>Debes Iniciar session para comprar</p>
                <?php elseif ($this->session->login_in && $this->session->role === 'client') : ?>
                    <button>Agregar al carrito</button>
                <?php elseif ($this->session->login_in && $this->session->role === 'admin') : ?>
                    <p>Lo sentimos. Los administradores NO PUEDEN COMPRAR</p>
                <?php endif ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</body>

</html>
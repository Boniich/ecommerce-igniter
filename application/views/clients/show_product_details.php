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
                <?php echo form_open('add_product_to_car/' . $item['id']); ?>
                <h3><?php echo $item['name'] ?></h3>
                <p><?php echo $item['description'] ?></p>
                <p>Cantidad disponible: <?php echo $item['stock'] ?></p>
                <?php if ($this->session->login_in && $this->session->role === 'client') : ?>
                    <label>Cantidad solicitada:</label>
                    <input onchange="changeInput()" type="number" id="amount" name="amount" min="1" max="<?php echo $item['stock'] ?>" value="1">
                    <small class="d-none" id="error-msg-input-amount">El valor debe ser entre 1 y la cantidad de disponible</small>
                <?php endif ?>
                <p class="text-dark fs-3"><b>$<?php echo $item['price'] ?></b></p>

                <?php if (!$this->session->login_in) : ?>
                    <div class="alert alert-info" role="alert">
                        Debes Iniciar session para comprar
                    </div>
                <?php elseif ($this->session->login_in && $this->session->role === 'client') : ?>
                    <button id="button-car" type="submit" class="btn btn-primary">Agregar al carrito</button>
                <?php elseif ($this->session->login_in && $this->session->role === 'admin') : ?>
                    <div class="alert alert-warning" role="alert">
                        Lo sentimos. Los administradores <b>NO PUEDEN COMPRAR</b>
                    </div>
                <?php endif ?>
                <?php echo form_close(); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/changeInput.js') ?>"></script>
</body>

</html>
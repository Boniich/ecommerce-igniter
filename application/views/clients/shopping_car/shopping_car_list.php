<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID del Producto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad solicitada</th>
            <th scope="col">Precio unitario</th>
            <th scope="col">P.Total x Producto</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products_in_car as $key => $product) : ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <th scope="row"><?php echo $product['id']; ?></th>
                <td><a class="link-dark fw-bolder text-decoration-none" href="<?php echo base_url('product/') . $product['id']; ?>"><?php echo $product['name']; ?> </a></td>
                <td class="card-text"><?php echo $product['product_amount']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td>$<?php echo $product['total_x_product']; ?></td>
                <td><a href="#" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editProductFromCarModal" data-product-id="<?php echo $product['id']; ?>" data-product-stock="<?php echo $product['stock']; ?>" data-product-amount="<?php echo $product['product_amount']; ?>">
                        Editar
                    </a></td>
                <td><a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductFromCarModal" data-client-id="<?php echo $this->session->id ?>" data-product-id="<?php echo $product['id']; ?>">
                        Eliminar
                    </a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div>
    <p>Total: <b>$<?php echo $total ?></b></p>
</div>

<div class="my-4">
    <?php echo $links; ?>
</div>

</div>
</body>

</html>
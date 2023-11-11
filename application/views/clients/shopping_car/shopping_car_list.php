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
            <th scope="col">Detalles</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products_in_car as $key => $product) : ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <th scope="row"><?php echo $product['id']; ?></th>
                <td><?php echo $product['name']; ?> </td>
                <td class="card-text"><?php echo $product['product_amount']; ?></td>
                <td>$<?php echo $product['price']; ?></td>
                <td>$<?php echo $product['total_x_product']; ?></td>

                <td><a href="<?php echo base_url('admin_panel/product/') . $product['id']; ?>">Detalles</a></td>
                <td>
                    Editar
                </td>
                <td>
                    Eliminar
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</body>

</html>
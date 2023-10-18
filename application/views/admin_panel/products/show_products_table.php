<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID del Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Detalles</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $key => $product) : ?>
                <tr>
                    <td><?php echo $key + 1 ?></td>
                    <th scope="row"><?php echo $product['id']; ?></th>
                    <td><?php echo $product['name']; ?> </td>
                    <td><?php echo $product['stock']; ?> </td>
                    <td>$<?php echo $product['price']; ?></td>

                    <td><a href="<?php echo base_url('admin_panel/product/') . $product['id']; ?>">Detalles</a></td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProductModal" data-id="<?php echo $product['id']; ?>">
                            Editar
                        </a></td>
                    <td><a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-id="<?php echo $product['id']; ?>">
                            Eliminar
                        </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>

</html>
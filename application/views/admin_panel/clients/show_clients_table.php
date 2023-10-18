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
                <th scope="col">ID de Cliente</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Email</th>
                <th scope="col">DNI</th>
                <th scope="col">Detalles</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $key => $client) : ?>
                <tr>
                    <td><?php echo $key + 1  ?></td>
                    <th scope="row" class="text-center"><?php echo $client['id']; ?></th>
                    <td><?php echo $client['full_name']; ?> </td>
                    <td><?php echo $client['email']; ?> </td>
                    <td><?php echo $client['dni']; ?></td>
                    <td><a href="<?php echo base_url('admin_panel/client/') . $client['id']; ?>">Detalles</a></td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateClientModal" data-id="<?php echo $client['id']; ?>">
                            Editar
                        </a></td>
                    <td><a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClientModal" data-id="<?php echo $client['id']; ?>">
                            Eliminar
                        </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>

</html>
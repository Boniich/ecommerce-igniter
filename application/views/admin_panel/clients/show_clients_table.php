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
                <th scope="col">Client ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">DNI</th>
                <th scope="col">Details</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $key => $client) : ?>
                <tr>
                    <th scope="row"><?php echo $key + 1  ?></th>
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['full_name']; ?> </td>
                    <td><?php echo $client['email']; ?> </td>
                    <td><?php echo $client['dni']; ?></td>
                    <td><a href="">Details</a></td>
                    <td><a href="">Edit</a></td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteClientModal" data-id="<?php echo $client['id']; ?>">
                            Delete
                        </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>

</html>
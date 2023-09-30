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
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Details</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th scope="row"><?php echo $product['id']; ?></th>
                    <td><?php echo $product['name']; ?> </td>
                    <td><?php echo $product['stock']; ?> </td>
                    <td>$<?php echo $product['price']; ?></td>
                    <td><a href="">Details</a></td>
                    <td><a href="">Edit</a></td>
                    <td><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-id="<?php echo $product['id']; ?>">
                            Delete
                        </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>


    <div class="modal" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this product?
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="#" id="deleteProduct">Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    var modal = document.getElementById('deleteProductModal');
    var deleteProduct = document.getElementById('deleteProduct');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        let id = button.getAttribute('data-id');
        let newURL = '<?php echo site_url('admin_product_panel/delete_product/'); ?>' + id;
        console.log(newURL);
        deleteProduct.setAttribute('href', newURL);

    });
</script>
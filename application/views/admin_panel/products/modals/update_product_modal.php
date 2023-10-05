<div class="modal" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin_product_panel/update_product'); ?>
                <input type="hidden" name="id" id="idUpdateProduct" required>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="inputEmail4">
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="inputPassword4">
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="inputPassword4">
                </div>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="inputEmail4">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>

<script>
    var modal = document.getElementById('updateProductModal');
    let inputId = document.getElementById('idUpdateProduct');

    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        let id = button.getAttribute('data-id');
        inputId.setAttribute('value', id);
    });
</script>
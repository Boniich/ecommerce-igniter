<div class="modal" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin_product_panel/create_product'); ?>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="inputPassword4" required>
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="inputPassword4" required>
                </div>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="inputEmail4">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Create</button>
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>
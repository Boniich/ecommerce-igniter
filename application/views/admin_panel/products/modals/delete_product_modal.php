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

<script>
    var modal = document.getElementById('deleteProductModal');
    var deleteProduct = document.getElementById('deleteProduct');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        let id = button.getAttribute('data-id');
        let newURL = '<?php echo site_url('delete_product/'); ?>' + id;
        console.log(newURL);
        deleteProduct.setAttribute('href', newURL);

    });
</script>
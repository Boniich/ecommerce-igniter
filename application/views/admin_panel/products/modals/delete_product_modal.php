<div class="modal" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger" href="#" id="deleteProduct">Si! Eliminar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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
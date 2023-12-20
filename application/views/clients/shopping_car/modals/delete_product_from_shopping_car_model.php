<div class="modal" id="deleteProductFromCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto del carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar este producto de tu carrito de compras?
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger" href="#" id="deleteProductFromCar">Si! Eliminar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById('deleteProductFromCarModal');
    var deleteProduct = document.getElementById('deleteProductFromCar');
    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        let client_id = button.getAttribute('data-client-id');
        let product_id = button.getAttribute('data-product-id');
        console.log(client_id);
        console.log(product_id);
        let newURL = '<?php echo site_url('delete_product_from_car/'); ?>' + client_id + '/' + product_id;
        console.log(newURL);
        deleteProduct.setAttribute('href', newURL);

    });
</script>
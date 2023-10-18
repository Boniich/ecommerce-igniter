<div class="modal" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin_panel/admin_product_panel/update_product'); ?>
                <input type="hidden" name="id" id="idUpdateProduct" required>
                <div class="col">
                    <label for="productName" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" id="productName">
                </div>
                <div class="col">
                    <label for="updateProductName" class="form-label">Descripcion</label>
                    <input type="text" name="description" class="form-control" id="updateProductName">
                </div>
                <div class="col">
                    <label for="updateProductStock" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="updateProductStock">
                </div>
                <div class="col">
                    <label for="updateProductPrice" class="form-label">Precio</label>
                    <input type="number" name="price" class="form-control" id="updateProductPrice">
                </div>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Imagen</label>
                    <input type="file" name="image" class="form-control" id="inputEmail4">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Editar</button>
                    <a class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>

<script>
    var modal = document.getElementById('updateProductModal');
    let inputName = document.getElementById('productName');
    let inputDescription = document.getElementById('updateProductName');
    let inputStock = document.getElementById('updateProductStock');
    let inputPrice = document.getElementById('updateProductPrice');
    let inputId = document.getElementById('idUpdateProduct');

    modal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        let id = button.getAttribute('data-id');
        inputId.setAttribute('value', id);

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(this.responseText);
                console.log(response);
                console.log(response.name);
                inputName.value = response[0].name;
                inputDescription.value = response[0].description;
                inputStock.value = response[0].stock;
                inputPrice.value = response[0].price;
            }
        }
        xhttp.open("GET", '<?= base_url('show_product_data/'); ?>' + id, true);
        xhttp.send();
    });

    modal.addEventListener('hide.bs.modal', function(event) {
        inputName.value = ''
        inputDescription.value = ''
        inputStock.value = ''
        inputPrice.value = ''
    });
</script>
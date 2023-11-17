<div class="modal" id="editProductFromCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <td>

                    <div>
                        <p> Stock disponible: <b id="stock"></b> </p>
                    </div>
                    <label>Cantidad solicitada:</label>
                    <input type="number" id="amount-shopping" name="amount-shopping" min="1">
                    <small class="d-none" id="error-msg-input-amount">El valor debe ser entre 1 y el STOCK disponible</small>
                </td>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-success" href="#" id="editProductFromCar">Si! Editar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById('editProductFromCarModal');

    modal.addEventListener('show.bs.modal', function(event) {

        let button = event.relatedTarget
        let editButton = document.getElementById('editProductFromCar');
        let product_id = button.getAttribute('data-product-id');
        let product_stock = button.getAttribute('data-product-stock');
        let product_amount = button.getAttribute('data-product-amount');

        let input = document.getElementById("amount-shopping");
        input.value = product_amount;
        input.max = product_stock;
        console.log(input.value);

        let stock = document.getElementById("stock");
        stock.innerHTML = product_stock;

        let evento = input.addEventListener('change', (e) => {
            console.log(e.target.value);
            let input = e.target;
            let msgError = document.getElementById("error-msg-input-amount");

            let value = parseInt(input.value);
            let min = parseInt(input.min);
            let max = parseInt(input.max);
            if (value < min || value > max || input.value === "") {
                msgError.className = "d-block text-danger";
                editButton.href = "#";
                editButton.className = "btn btn-success disabled";
            } else {
                msgError.className = "d-none";
                editButton.className = "btn btn-success";
                let newURL = '<?php echo site_url('update_product_from_car/'); ?>' + product_id + '/' + value;
                editButton.setAttribute('href', newURL);
            }
        });

        let newURL = '<?php echo site_url('update_product_from_car/'); ?>' + product_id + '/' + input.value;
        editButton.setAttribute('href', newURL);

    });
</script>
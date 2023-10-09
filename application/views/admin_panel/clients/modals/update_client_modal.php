<div class="modal" id="updateClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin_panel_client/update_client'); ?>
                <input type="hidden" name="id" id="idUpdateClient" required>
                <div class="col">
                    <label for="updateClientName" class="form-label">Full name</label>
                    <input type="text" name="full_name" class="form-control" id="updateClientName">
                </div>
                <div class="col">
                    <label for="updateClientEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="updateClientEmail">
                </div>
                <div class="col">
                    <label for="updateClientPassword" class="form-label">password</label>
                    <input type="text" name="password" class="form-control" id="updateClientPassword">
                </div>
                <div class="col">
                    <label for="updateClientDNI" class="form-label">DNI</label>
                    <input type="text" name="dni" class="form-control" id="updateClientDNI">
                </div>
                <div class="col">
                    <label for="updateClientProfileImage" class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" id="updateClientProfileImage">
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

<script>
    let updateClientModal = document.getElementById('updateClientModal');
    let inputId = document.getElementById('idUpdateClient');
    let inputFullName = document.getElementById('updateClientName');
    let inputEmail = document.getElementById('updateClientEmail');
    let inputPassword = document.getElementById('updateClientPassword');
    let inputDni = document.getElementById('updateClientDNI');


    updateClientModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        let id = button.getAttribute('data-id');
        inputId.setAttribute('value', id);

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let response = JSON.parse(this.responseText);
                inputFullName.value = response[0].full_name;
                inputEmail.value = response[0].email;
                inputPassword.value = response[0].password;
                inputDni.value = response[0].dni;
            }
        }
        xhttp.open("GET", '<?= base_url('get_client_data/'); ?>' + id, true);
        xhttp.send();
    });

    updateClientModal.addEventListener('hide.bs.modal', function(event) {
        inputFullName.value = ''
        inputEmail.value = ''
        inputPassword.value = ''
        inputDni.value = ''
    });
</script>
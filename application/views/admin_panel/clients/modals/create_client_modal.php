<div class="modal" id="createClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('create_client'); ?>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Nombre Completo</label>
                    <input type="text" name="full_name" class="form-control" id="inputEmail4" required>
                </div>
                <div class="col">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Contraseña</label>
                    <input type="text" name="password" class="form-control" id="inputPassword4" required>
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">DNI</label>
                    <input type="text" name="dni" class="form-control" required>
                </div>
                <div class="col">
                    <label for="inputPassword4" class="form-label">Imagen de Perfil</label>
                    <input type="file" name="profile_image" class="form-control" id="inputPassword4">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Crear</button>
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>
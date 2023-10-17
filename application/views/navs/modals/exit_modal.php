<div class="modal" id="exitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Deseas salir?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Estas por salir del sitio web. ¿Estas seguro que deseas hacerlo?
            </div>
            <div class="modal-footer">
                <?php if ($this->session->role === "admin") : ?>
                    <a type="button" class="btn btn-danger" href="<?php echo base_url('admin_logout'); ?>">Salir</a>
                <?php elseif ($this->session->role === "client") : ?>
                    <a type="button" class="btn btn-danger" href="<?php echo base_url('logout_client'); ?>">Salir</a>
                <?php endif ?>
                <button type=" button" class="btn btn-secondary" data-bs-dismiss="modal">Me quedo!</button>
            </div>
        </div>
    </div>
</div>
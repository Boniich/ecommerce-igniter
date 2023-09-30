<?php ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <br/><br/>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <h3 class="panel-title colorN">INGRESAR AL PANEL DEL SISTEMA</h3>
                    <div class="panel-body">
                        <form action="<?= base_url(); ?>Iniciar/ValidaUsuario" method="POST">                              
                            <p>Ingrese su Usuario</p>  <input type="text" autofocus name="usuario" class="form-control" id="user" placeholder="ingrese usuario" required="" autocomplete="off">
                            <p>Ingrese su Clave</p>  <input type="password" name="clave" class="form-control" id="pass" placeholder="ingrese su clave" required="" autocomplete="off">
                            <hr/>
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>Entrar</button>
                            <p><br/></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <h1> <?php echo($conforme); ?> </h1>
</body>
</html>
</body>
</html>

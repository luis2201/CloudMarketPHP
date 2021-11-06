<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once 'views/layers/header.php'; ?>
</head>

<body>
  <?php require_once 'views/layers/nav.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-xs|sm|md|lg|xl-1-12">

        <!-- Contenido principal -->
        <div class="container" style="height: 100%;">
          <div class="card mt-3 mx-auto mb-4 border-0">
            <div class="card-header border-secondary">
              <h5 class="ml-2"><strong>Actualizar datos del Usuario</strong></h5>
            </div>
            <div class="card-body">
              <div class="card col-md-10 mx-auto border-primary">
                <div class="card-header bg-primary text-end" style="padding: 0 5">
                  <a href="<?php echo URL; ?>usuario" class="btn btn-sm text-white">
                    <i class="fas fa-times-circle"></i>
                  </a>
                </div>
                <div class="card-body">
                  <form class="frmAction" action="<?php echo constant('URL'); ?>usuario/update/" method="POST" data-form="update" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">                      
                      <div class="col">
                        <div class="row mb-3">
                          <div class="col">
                            <label for="nombres" class="form-label"><strong>Nombres y Apellidos</strong></label>
                            <input type="text" id="nombres" name="nombres" class="form-control" onkeypress="HideMessages(this);" autofocus value="<?php echo $this->usuario->nombres; ?>">
                            <span id="mnombres" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label for="usuario" class="form-label"><strong>Usuario</strong></label>
                            <input type="text" id="usuario" name="usuario" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->usuario->usuario; ?>">
                            <span id="musuario" class="text-danger"></span>
                          </div>
                          <div class="col-md-6">
                            <label for="idrol" class="form-label"><strong>Rol de Usuario</strong></label>
                            <select id="idrol" name="idrol" class="form-select" onchange="HideMessages(this);">
                            <?php 
                              require_once 'controllers/usuarioController.php';
                              $obj = new UsuarioController();
                              foreach($this->roles as $row) { 
                              ?>
                                <option value=<?php echo '"'.$obj->encryption($row->idrol).'"'; if($row->idrol == $this->usuario->idrol) echo 'selected'; ?>><?php echo $row->rol; ?></option>
                              <?php } ?>
                            </select>
                            <span id="midrol" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-block btn-primary">Guardar</button>
                          </div>
                          <div class="col-md-6 d-grid">
                            <button type="button" id="btnCancelar" name="btnCancelar" class="btn btn-secondary">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="RespuestaForm"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin Contenido Principal -->

      </div>
    </div>
  </div>

  <?php require_once 'views/layers/footer.php'; ?>
  <script src="<?php echo URL . RESOURCE; ?>js/Usuarios.js"></script>
</body>

</html>

<?php echo $this->mensaje; ?>
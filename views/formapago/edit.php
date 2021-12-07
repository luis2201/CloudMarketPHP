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
              <h5 class="ml-2"><strong>Actualizar Forma de Pago</strong></h5>
            </div>
            <div class="card-body">
              <div class="card col-md-10 mx-auto border-primary">
                <div class="card-header bg-primary text-end" style="padding: 0 5">
                  <a href="<?php echo URL; ?>formapago" class="btn btn-sm text-white">
                    <i class="fas fa-times-circle"></i>
                  </a>
                </div>
                <div class="card-body">
                  <form class="frmAction" action="<?php echo constant('URL'); ?>formapago/update/" method="POST" data-form="update" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                      <div class="col">
                        <div class="row mb-3">
                          <div class="col">
                            <label for="formapago" class="form-label"><strong>Forma de Pago</strong></label>
                            <input type="text" id="formapago" name="formapago" class="form-control" onkeypress="HideMessages(this);" autofocus value="<?php echo $this->formapago->formapago; ?>">
                            <span id="mformapago" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-lg-6 col-md-12 col-sm-12 d-grid">
                            <button type="submit" class="btn btn-block btn-primary">Guardar</button>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12 d-grid">
                            <button type="button" id="btnCancelar" name="btnCancelar" class="btn btn-secondary">Cancelar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="RespuestaForm"></div>
                  </form>
                </div>
              </div>

              <a href="<?php echo URL; ?>formapago" class="btn-flotante"><i class="fas fa-angle-left"></i> Volver</a>
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
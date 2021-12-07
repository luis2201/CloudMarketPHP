<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once 'views/layers/header.php'; ?>
</head>

<body>
  <?php require_once 'views/layers/nav.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-12">

        <!-- Contenido principal -->
        <div class="container" style="height: 100%;">
          <div class="card mt-3 mx-auto mb-4 border-0">
            <div class="card-header border-secondary">
              <h5 class="ml-2"><strong>Configuraci&oacute;n de la Empresa</strong></h5>
            </div>
            <div class="card-body">

              <div class="card col-md-12 mx-auto border-primary">
                <div class="card-header bg-primary text-end" style="padding: 0 5">
                  <a href="<?php echo URL; ?>configuracion" class="btn btn-sm text-white">
                    <i class="fas fa-times-circle"></i>
                  </a>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                      <img src="<?php echo ($this->empresa->logo!='')?constant('URL').'public/img-user/'.$this->empresa->logo:constant('URL').'public/img-user/empresa-default.png'; ?>" class="w-100 p-3" alt="user-default">
                    </div>
                    <div class="col-lg-10 col-md-2 col-sm-12">
                      <form class="frmAction" action="<?php echo constant('URL'); ?>empresa/register" method="POST" data-form="insert" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                          <div class="col">
                            <div class="row mb-3">
                              <div class="col-lg-4 col-md-12 col-sm-12">
                                <label for="rucempresa" class="form-label"><strong>R.U.C.</strong></label>
                                <input type="text" id="rucempresa" name="rucempresa" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->rucempresa; ?>" autofocus>
                                <span id="mruc" class="text-danger"></span>
                              </div>
                              <div class="col-lg-8 col-md-12 col-sm-12">
                                <label for="logo" class="form-label"><strong>Logo</strong></label>
                                <input type="file" id="foto" name="foto" class="form-control">
                                <span id="mlogo" class="text-danger"></span>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col">
                                <label for="razonsocial" class="form-label"><strong>Raz&oacute;n Social</strong></label>
                                <input type="text" id="razonsocial" name="razonsocial" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->razonsocial; ?>">
                                <span id="mrazonsocial" class="text-danger"></span>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col">
                                <label for="actividadeconomica" class="form-label"><strong>Actividad econ&oacute;mica</strong></label>
                                <input type="text" id="actividadeconomica" name="actividadeconomica" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->actividadeconomica; ?>">
                                <span id="mactividadeconomica" class="text-danger"></span>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-3 col-md-12 col-sm-12">
                                <label for="ciudad" class="form-label"><strong>Ciudad</strong></label>
                                <input type="text" id="ciudad" name="ciudad" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->ciudad; ?>">
                                <span id="mciudad" class="text-danger"></span>
                              </div>
                              <div class="col-lg-9 col-md-12 col-sm-12">
                                <label for="direccion" class="form-label"><strong>Direcci&oacute;n</strong></label>
                                <input type="text" id="direccion" name="direccion" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->direccion; ?>">
                                <span id="mdireccion" class="text-danger"></span>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-6 col-md-12 col-sm-12">
                                <label for="telefono" class="form-label"><strong>Tel&eacute;fono</strong></label>
                                <input type="text" id="telefono" name="telefono" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->telefono; ?>">
                                <span id="mtelefono" class="text-danger"></span>
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="text" id="email" name="email" class="form-control" onkeypress="HideMessages(this);" value="<?php echo $this->empresa->email; ?>">
                                <span id="memail" class="text-danger"></span>
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

              <a href="<?php echo URL; ?>configuracion" class="btn-flotante"><i class="fas fa-angle-left"></i> Volver</a>
            </div>
          </div>
        </div>
        <!-- Fin Contenido Principal -->

      </div>
    </div>
  </div>

  <?php require_once 'views/layers/footer.php'; ?>
  <script src="<?php echo URL . RESOURCE; ?>js/Empresa.js"></script>
</body>

</html>
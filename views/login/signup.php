<?php $this->showMessagess(); ?>

<div class="container">
  <div class="card mt-3 mx-auto mb-4 border-0">
    <div class="card-header border-secondary">
      <h5 class="ml-2"><strong>Registro de Usuarios</strong></h5>
    </div>
    <div class="card-body">

      <div class="card col-md-6 mx-auto border-primary">
        <div class="card-header bg-primary text-end" style="padding: 0 5">
          <a href="#" class="btn btn-sm text-white">
            <i class="fas fa-times-circle"></i>
          </a>
        </div>
        <div class="card-body">
          <form class="" action="<?php echo constant('URL'); ?>signup/newUser" method="POST">
            <div class="row">              
              <div class="col">
                <div class="row mb-3">
                  <div class="col">
                    <label for="nombres" class="form-label"><strong>Nombres y Apellidos</strong></label>
                    <input type="text" id="nombres" name="nombres" class="form-control" onkeypress="HideMessages(this);" autofocus>
                    <span id="mnombres" class="text-danger"><?php echo $valida->nombres ?></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <label for="usuario" class="form-label"><strong>Usuario</strong></label>
                    <input type="text" id="usuario" name="usuario" class="form-control" onkeypress="HideMessages(this);">
                    <span id="musuario" class="text-danger"><?php echo $valida->usuario ?></span>
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
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
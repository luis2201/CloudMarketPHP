<div class="container">
  <div class="card mt-3 mx-auto mb-4 border-0">
    <div class="card-header border-secondary">
      <h5 class="ml-2"><strong>Registro de Usuarios</strong></h5>
    </div>
    <div class="card-body">

      <div class="card col-md-10 mx-auto border-primary">
        <div class="card-header bg-primary" style="padding: 0 5">
          <a href="<?php echo APP; ?>Usuarios/list" class="close btn text-white" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 border">
              <output class="text-center">
              <img src="<?php echo APP.RESOURCE; ?>img/user-default.png" class="w-75 p-3" alt="user-default">
              </output>
            </div>
            <div class="col-md-8">
              <form method="post" enctype="nultipart/form-data">
                <div class="row mb-3">
                  <div class="col">
                    <label for="nombres" class="form-label"><strong>Nombres y Apellidos</strong></label>
                    <input type="text" id="nombres" name="nombres" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="usuario" class="form-label"><strong>Usuario</strong></label>
                    <input type="text" id="usuario" name="usuario" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label for="idrol" class="form-label"><strong>Rol de Usuario</strong></label>
                    <select id="idrol" name="idrol" class="form-select">
                      <option value="">-- Seleccion un rol de usuario --</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="foto">Foto</label>
                    <input class="form-control" id="formFileLg" type="file">
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
                <!--<div class="alert alert-danger" role="alert">
                  <i class="fas fa-exclamation-triangle"></i>
                  A simple danger alert—check it out!
                </div>-->
              </form>
            </div>
          </div> 
        </div>
      </div>

    </div>
  </div>
</div>
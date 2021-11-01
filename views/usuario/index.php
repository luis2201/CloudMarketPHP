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
        <div class="container">
          <div class="card mt-3 mx-auto mb-4 border-0">
            <div class="card-header border-secondary">
              <h5 class="ml-2"><strong>Lista de Usuarios registrados</strong></h5>
            </div>
            <div class="card-body">

              <div class="card mx-auto border-primary">
                <div class="card-header bg-primary text-end" style="padding: 5">
                  <a href="<?php echo URL; ?>usuario/new" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i> Agregar Usuario
                  </a>
                </div>
                <div class="card-body">
                  <table id="tbLista" class="table table-sm table-striped display">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once 'controllers/usuarioController.php';
                      $obj = new UsuarioController();

                      foreach ($this->usuarios as $row) { 
                        $usuario = new UsuarioDAO();
                        $usuario = $row;
                      ?>
                      <tr>
                        <th scope="row" class="text-center"></th>
                        <td><?php echo $usuario->nombres; 
                            ?></td>
                        <td class="text-center"><?php echo $usuario->usuario; 
                                                ?></td>
                        <td class="text-center"><?php echo $usuario->rol; 
                                                ?></td>
                        <td class="text-center"><?php echo $usuario->estado ? '<span class="badge bg-success">ACTIVO</span>' : '<span class="badge bg-danger">INACTIVO</span>'; 
                                                ?></td>
                        <td class="text-center">
                          <a href="<?php echo URL.'usuario/view/'.$obj->encryption($usuario->idusuario); 
                                    ?>"><i class="fas fa-edit text-dark"></i></a>
                          <a href="<?php echo URL.'usuario/delete/'.$obj->encryption($usuario->idusuario);
                                    ?>"><i class="fas fa-trash-alt text-danger"></i></a>
                        </td>
                      </tr>
                      <?php
                      } 
                      ?>
                    </tbody>
                  </table>
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
</body>
</html>

<?php if($this->mensaje != "") echo $this->mensaje; ?>
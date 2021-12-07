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
        <div class="container">
          <div class="card mt-3 mx-auto mb-4 border-0">
            <div class="card-header border-secondary">
              <h5 class="ml-2"><strong>Lista de Formas de Pago registrados</strong></h5>
            </div>
            <div class="card-body">

              <div class="card mx-auto border-primary">
                <div class="card-header bg-primary text-end" style="padding: 5">
                  <a href="<?php echo URL; ?>formapago/new" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle"></i> Agregar Forma de Pago
                  </a>
                </div>
                <div class="card-body">
                  <table id="tbLista" class="table table-sm table-striped display" style="width:100%">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Forma de Pago</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody id="tbody-formapago">
                      <?php
                      require_once 'controllers/formapagoController.php';
                      $obj = new FormaPagoController();
                      $i = 1;
                      foreach ($this->formapagos as $row) {
                        $formapago = new FormapagoDAO();
                        $formapago = $row;
                      ?>
                        <tr id="fila-<?php echo $obj->encryption($formapago->idformapago); ?>">
                          <th scope="row" class="text-center"><?php echo $i; ?></th>
                          <td><?php echo $formapago->formapago; ?></td>
                          <td class="text-center"><?php echo $formapago->estado ? '<span class="badge bg-success">ACTIVO</span>' : '<span class="badge bg-danger">INACTIVO</span>'; ?></td>
                          <td class="text-center">
                            <a class="btn btn-sm btn-link" href="<?php echo URL . 'formapago/view/' . $obj->encryption($formapago->idformapago); ?>"><i class="fas fa-eye text-warning"></i></a>
                            <a class="btn btn-sm btn-link" href="<?php echo URL . 'formapago/edit/' . $obj->encryption($formapago->idformapago); ?>"><i class="fas fa-edit text-dark"></i></a>
                            <button type="button" class="btn btn-sm btn-link btnEliminar" data-url="<?php echo URL.'formapago/delete/'.$obj->encryption($formapago->idformapago); ?>"><i class="fas fa-trash-alt text-danger"></i></button>
                            <button type="button" class="btn btn-sm btn-link btnEstado" data-url="<?php echo URL.'formapago/change/'.$obj->encryption($formapago->idformapago); ?>"><i class="fas fa-retweet text-info"></i></button>
                          </td>
                        </tr>
                      <?php
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <div id="RespuestaForm"></div>
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
</body>

</html>

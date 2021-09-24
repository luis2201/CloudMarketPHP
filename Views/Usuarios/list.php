<div class="container">
  <div class="card mt-3 mx-auto mb-4 border-0">
    <div class="card-header border-secondary">
      <h5 class="ml-2"><strong>Lista de Usuarios registrados</strong></h5>
    </div>
    <div class="card-body">
      
      <div class="card col-md-10 mx-auto border-success">
        <div class="card-header bg-success text-end" style="padding: 5">
          <a href="<?php echo APP; ?>Usuarios/add" class="btn btn-sm btn-success">
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
              <tr>
                <th scope="row" class="text-center">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center">
                  <a href="#"><i class="fas fa-edit text-dark"></i></a>
                  <a href="#"><i class="fas fa-trash-alt text-danger"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>
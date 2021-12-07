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
        <div class="p-5 bg-light mt-3">
          <div class="container">
            <h1 class="display-3"><?php echo $this->formapago->formapago; ?></h1>
            <hr class="my-2">
            <p class="lead"><strong>Estado: </strong><?php echo $this->formapago->estado ? '<span class="badge bg-success">ACTIVO</span>' : '<span class="badge bg-danger">INACTIVO</span>'; ?></p>

            <a href="<?php echo URL; ?>formapago" class="btn-flotante"><i class="fas fa-angle-left"></i> Volver</a>
          </div>
        </div>  
      <!-- Fin Contenido Principal -->

      </div>
    </div>
  </div>

  <?php require_once 'views/layers/footer.php'; ?>
</body>

</html>
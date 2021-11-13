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
        <div class="p-5 mt-5">
          <div class="container" style="height: 100%;">
            <div class="card-deck">
              <div class="card-body text-center">
                <h1 class="display-1"><strong><?php echo $this->code ?></strong></h1>
                <i class="fas fa-exclamation-circle fa-7x text-danger"></i>
                <p class="mt-4 display-4"><?php echo $this->mensaje ?></p>
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
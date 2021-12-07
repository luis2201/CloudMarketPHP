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
        <div class="p-5 mt-3">
          <div class="container">

            <div class="container px-4 py-5" id="icon-grid">
              <h2 class="pb-2 border-bottom text-primary">Configuraci&oacute;n del Sistema</h2>

              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">

                <!-- Empresa -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="building" class="fas fa-building"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#building" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Empresa</h4>
                    <p>Registro y actualización de la información y logo de la empresa.</p>
                    <a href="<?php echo URL; ?>empresa">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>

                <!-- Usuarios -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="users" class="fas fa-users"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#users" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Usuarios</h4>
                    <p>Registro y actualización de la información y estado de los usuarios.</p>
                    <a href="<?php echo URL; ?>usuario">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>

                <!-- Permisos -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="permits" class="fas fa-user-shield"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#permits" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Permisos </h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                    <a href="<?php echo URL; ?>permiso">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>

                <!-- Formas de Pago -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="money-check-alt" class="fas fa-money-check-alt"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#money-check-alt" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Formas de Pago</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                    <a href="<?php echo URL; ?>formapago">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>
                
                <!-- Sistema -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="laptop-code" class="fas fa-laptop-code"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#laptop-code" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Sistema</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                    <a href="<?php echo URL; ?>sistema">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>

                <!--  -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="print" class="fas fa-print"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#print" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Impresora</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                    <a href="<?php echo URL; ?>impresora">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>

                <!-- Copia de Seguridad -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="hdd" class="fas fa-hdd"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#hdd" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Copia de Seguridad</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                    <a href="<?php echo URL; ?>backup">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
                </div>

                <!-- Restaurar Copia de Seguridad -->
                <div class="col d-flex align-items-start">
                  <i data-fa-symbol="database" class="fas fa-database"></i>
                  <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#database" />
                  </svg>
                  <div>
                    <h4 class="fw-bold mb-0">Restaurar Copia de Seguridad</h4>
                    <p>Paragraph of text beneath the heading to explain the heading.</p>
                    <a href="<?php echo URL; ?>restore">
                      <i data-fa-symbol="chevron-right" class="fas fa-chevron-right"></i>
                      Abrir
                      <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
                    </a>
                  </div>
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
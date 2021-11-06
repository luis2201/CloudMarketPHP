$(document).ready(function () {
  var table = $('#tbLista').DataTable({
    select: true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    },

  });
  table.on('order.dt search.dt', function () {
    table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
    });
  }).draw();
});

$('.frmAction').submit(function(event){	
	event.preventDefault();

  var validator = $(this).validate();
  if(!validator.form()){
    return;
  }

  var form = $(this);
	var accion = form.attr('action');
	var metodo = form.attr('method');
	var formdata = new FormData(this);

  $.confirm({
    icon      : 'fas fa-question-circle',
    theme     : 'modern',
    type      : 'blue',
    animation : 'scale',
    title     : '¿Desea continuar con esta acción?',
    content   : 'No se podrán deshacer los cambios realizados',
    buttons   : {
      confirm: {
        text: 'Confirmar',
        btnClass: 'btn-blue',
        action: function () {
          $.ajax({
            type        : metodo,
            url         : accion,
            data        : formdata ? formdata : form.serialize(),
            cache       : false,
            contentType : false,
            processData : false,
            success: function (data) {
              $('#RespuestaForm').html(data);					
            },
            error: function() {
              //$('#RespuestaForm').html(msjError);
            }
          });
        }	
      },
      cancel: {
        text  : 'Cancelar',
        action: function () {

        }
      },
    }
  });

});

const boton = document.querySelectorAll(".btnEliminar");
boton.forEach(btn => {
  btn.addEventListener('click', function () {
    const usuario = this.dataset.usuario;

    $.confirm({
      icon      : 'fas fa-question-circle',
      theme     : 'modern',
      type      : 'orange',
      animation : 'scale',
      title     : '¿Desea eliminar registro?',
      content   : 'No se podrán deshacer los cambios realizados',
      buttons   : {
        confirm: {
          text    : 'Confirmar',
          btnClass: 'btn-orange',
          action: function () {
            httpRequest("http://localhost/CloudMarketPHP/usuario/delete/" + usuario, function () {
              const tbody = document.querySelector("#tbody-usuario");
              const fila = document.querySelector("#fila-" + usuario);
              tbody.removeChild(fila);

              $('#RespuestaForm').html(this.responseText);
            });
          }
        },
        cancel: {
          text  : 'Cancelar', 
          action: function () {
          
          }
        },
      }
    });
  });
});

function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  }
}
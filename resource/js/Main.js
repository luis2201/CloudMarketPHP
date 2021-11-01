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

$('.frmAction').submit(function (event) {
  //event.preventDefault();
  var x = ($(this).validate());
  if (x.errorList.length > 0) {
    return;
  }
});
$(document).ready( function () {
  $('#tbLista').DataTable({
    select: true,
    "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      
  });
} );

$('.frmAction').submit(function(event){	
	event.preventDefault();
  /*
	var x = ($(this).validate());	
	if(x.errorList.length>0){		
		return;
	}
  */
});

$('#btnCancelar').click(function() {
  $('.frmAction')[0].reset();
});
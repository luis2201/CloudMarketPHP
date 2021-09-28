$(document).ready( function () {
  $('#tbLista').DataTable({
    select: true,
    "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      
  });
} );

class Main {

  linkPrincipal(URLactual) {    
    let url = "";
    let cadena = URLactual.split("/");

    for (let i = 0; i < cadena.length; i++) {
      if (i >= 2) {
        url += cadena[i];        
      }
    }        

    switch (url) {
      case "UsuariosAdd":        
        document.getElementById('foto').addEventListener('change', fotoUsuario, false);
        break;      
    }
  }

}
var usuarios = new Usuarios();
var fotoUsuario = (evt) => {
  usuarios.archivo(evt, "fotoUsuario");
}

var main = new Main();
$().ready(()=>{
  let URLactual = window.location.pathname;  
  main.linkPrincipal(URLactual);
});
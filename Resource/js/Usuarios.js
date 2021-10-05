class Usuarios extends UploadImg {

  HideMessages(input) {    
    switch (input.name) {
      case "nombres":
        document.getElementById("m"+input.name).innerHTML = "";
        break;
    
      case "usuario":
        document.getElementById("m"+input.name).innerHTML = "";
        break;

      case "rol":
        document.getElementById("m"+input.name).innerHTML = "";
        break;
    }
  }

}
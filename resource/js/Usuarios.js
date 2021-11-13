jQuery.validator.addMethod("letter", function (value, element) {
  return this.optional(element) || /^[a-zA-záéíóúÁÉÍÓÚñÑ ]+$/i.test(value);
}, "Solo letras");

jQuery.validator.addMethod("alphanumeric", function (value, element) {
  return this.optional(element) || /^[a-z0-9]+$/i.test(value);
}, "Alfanumérico");

var validator = $('.frmAction').validate({
  onfocusout      : false,
  onkeyup         : false,
  onclick         : false,
  focusInvalid    : true,
  errorClass      : "form-error",
  rules: {
    nombres: {
      required    : true,
      letter      : true,
      maxlength   : 255
    },
    usuario: {
      required    : true,
      alphanumeric: true,
      minlength   : 6,
      maxlength   : 25
    },
    idrol: {
      required    : true
    }
  },
  messages: {
    nombres: {
      required    : "Ingrese apellidos y nombres",
      letter      : "El campo nombres es de solo texto",
      maxlength   : "El campo nombres admite 255 caracteres"
    },
    usuario: {
      required    : "Ingrese su usuario",
      alphanumeric: "El campo usuario no admite espacios, tildes, ni caracteres especiales",
      minlength   : "El usuario debe ser una cadena de al menos 6 caracteres",
      maxlength   : "El usuario debe ser un cadena no mayor a 25 caracteres"
    },
    idrol: {
      required: "Seleccione el rol del usuario"
    }
  },
  errorPlacement: function (error, element) {
    if (element.attr("name") == "nombres") {
      const div = document.querySelector("#mnombres");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "usuario") {
      const div = document.querySelector("#musuario");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "idrol") {
      const div = document.querySelector("#midrol");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    }
  }
});

function HideMessages(input) {
  element = document.getElementById(input.name);
  switch (input.name) {
    case "nombres":
      //element.classList.remove("form-error");
      document.getElementById("mnombres").innerHTML = "";
      break;

    case "usuario":
      //element.classList.remove("form-error");
      document.getElementById("musuario").innerHTML = "";
      break;

    case "idrol":
      //element.classList.remove("form-error");
      document.getElementById("midrol").innerHTML = "";
      break;
  }
}

$('#btnCancelar').click(function () {
  $('.frmAction')[0].reset();
  //$('img').attr('src', '/CloudMarketPHP/Resource/img/user-default.png'); 
  //location.reload();
});
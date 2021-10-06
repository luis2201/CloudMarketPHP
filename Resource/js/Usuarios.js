jQuery.validator.addMethod("letter", function (value, element) {
  return this.optional(element) || /^[a-zA-záéíóúÁÉÍÓÚñÑ ]+$/i.test(value);
}, "Solo letras");

jQuery.validator.addMethod("alphanumeric", function (value, element) {
  return this.optional(element) || /^[a-z0-9]+$/i.test(value);
}, "Alfanumérico");

var validator = $('.frmAction').validate({
  onfocusout: false,
  onkeyup: false,
  onclick: false,
  focusInvalid: true,
  errorClass: "form-error",
  rules: {
    nombres: {
      required: true,
      letter: true,
      maxlength: 255
    },
    usuario: {
      required: true,
      alphanumeric: true,
      minlength: 6,
      maxlength: 25
    },
    rol: {
      required: true
    }
  },
  messages: {
    nombres: {
      required: "Ingrese nombres",
      letter: "El campo nombres es de solo texto",
      maxlength: "El campo nombres admite 255 caracteres"
    },
    usuario: {
      required: "<i class='fas fa-exclamation-circle'></i> Ingrese su usuario",
      alphanumeric: "El campo usuario no admite espacios, tildes, ni caracteres especiales",
      minlength: "El usuario debe ser una cadena de al menos 6 caracteres",
      maxlength: "El usuario debe ser un cadena no mayor a 25 caracteres"
    },
    rol: {
      required: "<i class='fas fa-exclamation-circle'></i> Seleccione el rol del usuario"
    }
  },
  errorPlacement: function (error, element) {
    if (element.attr("name") == "nombres") {
      $("#mnombres").text($(error).text());
    } else if (element.attr("name") == "usuario") {
      $("#musuario").text($(error).text());
    } else if (element.attr("name") == "rol") {
      $("#mrol").text($(error).text());
    }
  }
});

function HideMessages(input) {
  element = document.getElementById(input.name);
  switch (input.name) {
    case "nombres":
      element.classList.remove("form-error");
      document.getElementById("mnombres").innerHTML = "";
      break;

    case "usuario":
      element.classList.remove("form-error");
      document.getElementById("musuario").innerHTML = "";
      break;

    case "rol":
      element.classList.remove("form-error");
      document.getElementById("mrol").innerHTML = "";
      break;
  }
}

$('#btnCancelar').click(function () {
  $('.frmAction')[0].reset();
  $('img').attr('src', '/CloudMarketPHP/Resource/img/user-default.png'); 
});
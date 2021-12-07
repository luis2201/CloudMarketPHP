jQuery.validator.addMethod("letter", function (value, element) {
  return this.optional(element) || /^[a-zA-záéíóúÁÉÍÓÚñÑ ]+$/i.test(value);
}, "Solo letras");

jQuery.validator.addMethod("alphanumeric", function (value, element) {
  return this.optional(element) || /^[a-zA-záéíóúÁÉÍÓÚñÑ0-9,. ]+$/i.test(value);
}, "Alfanumérico");

jQuery.validator.addMethod("numeric", function (value, element) {
  return this.optional(element) || /^[0-9]+$/i.test(value);
}, "Numérico");

var validator = $('.frmAction').validate({
  onfocusout      : false,
  onkeyup         : false,
  onclick         : false,
  focusInvalid    : true,
  errorClass      : "form-error",
  rules: {
    ruc: {
      required    : true,
      numeric      : true,
      minlength   : 13,
      maxlength   : 13
    },
    razonsocial: {
      required    : true,
      alphanumeric: true,
      minlength   : 4,
      maxlength   : 255
    },
    actividadeconomica: {
      required    : true,
      alphanumeric: true,
      minlength   : 4,
      maxlength   : 500
    },
    ciudad: {
      required    : true,
      letter      : true,
      minlength   : 4,
      maxlength   : 50
    },
    direccion: {
      required    : true,
      alphanumeric: true,
      minlength   : 4,
      maxlength   : 500
    },
    telefono: {
      required    : true,
      numeric     : true,
      minlength   : 9,
      maxlength   : 10
    },
    email: {
      required    : true,
      email       : true
    }
  },
  messages: {
    ruc: {
      required    : "Ingrese RUC del establecimiento",
      numeric     : "El campo RUC &uacute;nicamente admite n&uacute;meros",
      minlength   : "El RUC debe tener 13 caracteres",
      maxlength   : "El RUC no debe superar los 13 caracteres"
    },
    razonsocial: {
      required    : "Ingrese la Raz&oacute;n Social del Establecimiento",
      alphanumeric: "El campo Raz&oacute;n Social &uacute;nicamente admite letras, n&uacute;meros, espacios y tildes",
      minlength   : "La Raz&oacute;n Social debe tener al menos 6 caracteres",
      maxlength   : "La Raz&oacute;n Social no debe superar los 25 caracteres"
    },
    actividadeconomica: {
      required    : "Ingrese la Actividad Econ&oacute;mica del Establecimiento",
      alphanumeric: "El campo Actividad econ&oacute;mica &uacute;nicamente admite letras, espacios y tildes",
      minlength   : "La Actividad Econ&oacute;nomica debe tener al menos 6 caracteres",
      maxlength   : "La Actividad Econ&oacute;nomica no debe superar los 25 caracteres"
    },
    ciudad: {
      required    : "Ingrese la Ciudad del Establecimiento",
      alphanumeric: "El campo Ciudad &uacute;nicamente admite letras, espacios y tildes",
      minlength   : "La Ciudad debe tener al menos 4 caracteres",
      maxlength   : "La Ciudad no debe superar los 50 caracteres"
    },
    direccion: {
      required    : "Ingrese la Direcci&oacute;n del Establecimiento",
      alphanumeric: "El campo Direcci&oacute;n &uacute;nicamente admite letras, espacios y tildes",
      minlength   : "La Direcci&oacute;n debe tener al menos 4 caracteres",
      maxlength   : "La Direcci&oacute;n no debe superar los 500 caracteres"
    },
    telefono: {
      required    : "Ingrese Tel&eacute;fono del Establecimiento",
      alphanumeric: "El campo Tel&eacute;fono &uacute;nicamente admite n&uacute;meros",
      minlength   : "El Tel&eacute;fono debe tener al menos 9 caracteres",
      maxlength   : "El Tel&eacute;fono no debe superar los 10 caracteres"
    },
    email: {
      required    : "Ingrese Email del Establecimiento",
      email       : "Ingrese un Email v&aacute;lido Ej: info@miempresa.com"
    }
  },
  errorPlacement: function (error, element) {
    if (element.attr("name") == "ruc") {
      const div = document.querySelector("#mruc");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "razonsocial") {
      const div = document.querySelector("#mrazonsocial");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "actividadeconomica") {
      const div = document.querySelector("#mactividadeconomica");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "ciudad") {
      const div = document.querySelector("#mciudad");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "direccion") {
      const div = document.querySelector("#mdireccion");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "telefono") {
      const div = document.querySelector("#mtelefono");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } else if (element.attr("name") == "email") {
      const div = document.querySelector("#memail");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    }
  }
});

function HideMessages(input) {
  element = document.getElementById(input.name);
  switch (input.name) {
    case "ruc":
      document.getElementById("mruc").innerHTML = "";
      break;

    case "razonsocial":
      document.getElementById("mrazonsocial").innerHTML = "";
      break;

    case "actividadeconomica":
      document.getElementById("mactividadeconomica").innerHTML = "";
      break;

    case "ciudad":
      document.getElementById("mciudad").innerHTML = "";
      break;

    case "telefono":
      document.getElementById("mtelefono").innerHTML = "";
      break;

    case "email":
      document.getElementById("memail").innerHTML = "";
      break;
  }
}

$('#btnCancelar').click(function () {
  $('.frmAction')[0].reset();
  //$('img').attr('src', '/CloudMarketPHP/Resource/img/user-default.png'); 
  //location.reload();
});
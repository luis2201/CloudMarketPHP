jQuery.validator.addMethod("letter", function (value, element) {
  return this.optional(element) || /^[a-zA-záéíóúÁÉÍÓÚñÑ ]+$/i.test(value);
}, "Solo letras");

var validator = $('.frmAction').validate({
  onfocusout      : false,
  onkeyup         : false,
  onclick         : false,
  focusInvalid    : true,
  errorClass      : "form-error",
  rules: {
    formapago: {
      required    : true,
      letter      : true,
      minlength   : 4,
      maxlength   : 255
    }
  },
  messages: {
    formapago: {
      required    : "Ingrese Forma de Pago",
      letter      : "El campo Formas de Pago es de solo texto",
      minlength   : "El campo Formas de Pago debe tener al menos 6 caracteres",
      maxlength   : "El campo Formas de Pago no debe superar los 50 caracteres"
    }
  },
  errorPlacement: function (error, element) {
    if (element.attr("name") == "formapago") {
      const div = document.querySelector("#mformapago");
      div.innerHTML = "<i class='fas fa-exclamation-triangle'></i> " + $(error).text();
    } 
  }
});

function HideMessages(input) {
  element = document.getElementById(input.name);
  switch (input.name) {
    case "formapago":
      //element.classList.remove("form-error");
      document.getElementById("mformapago").innerHTML = "";
      break;
  }
}

$('#btnCancelar').click(function () {
  $('.frmAction')[0].reset();
  //$('img').attr('src', '/CloudMarketPHP/Resource/img/user-default.png'); 
  //location.reload();
});
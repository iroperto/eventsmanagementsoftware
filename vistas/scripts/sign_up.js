function toast_campos(mensaje, campo) {
  toastr.error(mensaje, campo);
}
var strength = 0;

$(document).ready(function() {
  var nameAllowed = 'false';
  $("form").submit(function(event) {
    event.preventDefault();
    if ((!($('#nombre') === '')) && (!($("#nombre").val().length < 3)) && (!($('#apellido').val() === '')) && (!($("#apellido").val().length < 3)) && (!($('#email').val() === '')) && (!($('#emailValido').val() === 'no')) && (!($('#password').val() === '')) && (strength >= 5) && (!($('#confirm').val() === '')) && (!($('#validconfirm').val() === 'no')) && (!(terminosAceptados === 'no'))) {
      registrar(event);
    } else if ($('#nombre').val() === '') {
      toast_campos('Debe proporcionar su(s) nombre(s)', 'Nombre');
      $("#nombre").addClass('error-validacion');
      $("#nombre").focus();
      event.preventDefault();
    } else if ($("#nombre").val().length < 3) {
      toast_campos('El nombre debe tener al menos 3 caracteres', 'Nombre');
      $("#nombre").focus();
      $("#nombre").select();
      event.preventDefault();
    } else if ($('#apellido').val() === '') {
      toast_campos('Debe proporcionar su(s) apellido(s)', 'Apellido');
      $("#apellido").addClass('error-validacion');
      $("#apellido").focus();
      event.preventDefault();
    } else if ($("#apellido").val().length < 3) {
      toast_campos('El apellido debe tener al menos 3 caracteres', 'Apellido');
      $("#apellido").focus();
      $("#apellido").select();
      event.preventDefault();
    } else if ($('#email').val() === '') {
      toast_campos('Debe ingresar el correo electronico', 'Email');
      $("#email").addClass('error-validacion');
      $("#email").focus();
      event.preventDefault();
    } else if ($('#emailValido').val() === 'no') {
      toast_campos('Formato incorrecto o correo existente', 'Email');
      $("#email").focus();
      $("#email").select();
      event.preventDefault();
    } else if ($('#password').val() === '') {
      toast_campos('Debe ingresar una contraseña', 'Password');
      $("#password").addClass('error-validacion');
      $("#password").focus();
      event.preventDefault();
    } else if (strength < 5) {
      toast_campos('Contraseña no cumple con el minimo de seguridad establecido', 'Password');
      $("#password").focus();
      $("#password").select();
      event.preventDefault();
    } else if ($('#confirm').val() === '') {
      toast_campos('Debe confirmar la contraseña', 'Password');
      $("#confirm").addClass('error-validacion');
      $("#confirm").focus();
      event.preventDefault();
    } else if ($('#validconfirm').val() === 'no') {
      toast_campos('Las contraseñas no coinciden', 'Password');
      $("#confirm").focus();
      $("#confirm").select();
      event.preventDefault();
    } else if (terminosAceptados === 'no') {
      toast_campos('Debe aceptar los terminos y condiciones de uso', 'Terminos');
      event.preventDefault();
    }
  });
  var terminosAceptados = 'no';

  $('#password').keyup(function() {
    var password = $('#password').val();
    strength = checkStrength(password);
  });

  $('#email').keyup(function(e) {
    var mailcheck = $('#email').val();
    validarEmail(mailcheck);
  });
  $('#confirm').keyup(function(e) {
    checkConfirm();
  });
  $('#terms').click(function(e) {
    terminosCond();
  });
  $("#registrar").click(function() {
    $("#sign_up").submit();
  });

  function validarEmail(email) {
    var largoEmail = email.length + 1;

    if (largoEmail > 1) {

      var emailReg = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,10}$/i;
      if (emailReg.test(email)) {

        $.post("../ajax/checkmail.php", {
          'email': email
        }, function(data) {
          sqlEmail = data.existe;
          if (sqlEmail == 'si') {
            emailExist('true');
          } else if (sqlEmail == 'no') {
            emailExist('false');
          }
          return emailValido;
        }, "json");
      } else {
        emailExist('false');
        $("#emailValido").val('no');
      }
    }
  }

  function emailExist(cond) {
    if (cond == 'true') {
      $('#mailexist').show("fast");
      $("#emailValido").val('no');
    } else {
      $('#mailexist').hide("fast");
      $("#emailValido").val('si');
    }
  }


  function checkStrength(password) {
    var strength = 0;
    if (password.length > 7) {
      $('#condicion1').removeClass('far fa-circle');
      $('#condicion1').addClass('fas fa-check-circle');
      strength += 1;
    } else {
      $('#condicion1').removeClass('fas fa-check-circle');
      $('#condicion1').addClass('far fa-circle');
    }
    if (password.match(/([a-z])/)) {
      $('#condicion2').removeClass('far fa-circle');
      $('#condicion2').addClass('fas fa-check-circle');
      strength += 1;
    } else {
      $('#condicion2').removeClass('fas fa-check-circle');
      $('#condicion2').addClass('far fa-circle');
    }
    if (password.match(/([A-Z])/)) {
      $('#condicion3').removeClass('far fa-circle');
      $('#condicion3').addClass('fas fa-check-circle');
      strength += 1;
    } else {
      $('#condicion3').removeClass('fas fa-check-circle');
      $('#condicion3').addClass('far fa-circle');
    }
    if (password.match(/([0-9])/)) {
      $('#condicion4').removeClass('far fa-circle');
      $('#condicion4').addClass('fas fa-check-circle');
      strength += 1;
    } else {
      $('#condicion4').removeClass('fas fa-check-circle');
      $('#condicion4').addClass('far fa-circle');
    }
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
      $('#condicion5').removeClass('far fa-circle');
      $('#condicion5').addClass('fas fa-check-circle');
      strength += 1;
    } else {
      $('#condicion5').removeClass('fas fa-check-circle');
      $('#condicion5').addClass('far fa-circle');
    }
    return strength;
  }

  function checkConfirm() {
    var pass = $('#password').val();
    var confirm = $('#confirm').val();

    if (pass == confirm) {
      $("#validconfirm").val('si');
    } else {
      $("#validconfirm").val('no');
    }

  }

  function terminosCond() {
    if ($("#terms").is(':checked')) {
      terminosAceptados = 'si';
    } else {
      terminosAceptados = 'no';
    }
  }


  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  function registrar(e) {

    e.preventDefault();
    $("#registrar").prop("disabled", true);
    var formData = new FormData($("#sign_up")[0]);

    $.ajax({
      url: "../ajax/sign-up.php?op=insertar",
      type: "POST",
      data: formData,
      dataType: "json",
      contentType: false,
      processData: false,

      success: function(datos) {

        var mensaje = datos.mensaje ;
        var estatus = datos.estatus ;

        if (estatus) {
            var icono = 'success';
            var colorBtn = '#3085d6';
            var textBtn = 'Continuar';
            var confBtn = true;
            var cancelBtn = false;
        } else {
            var icono = 'error';
            var colorBtn = '#f00';
            var textBtn = 'Regresar';
            var confBtn = false;
            var cancelBtn = true;
        }
          swal({
            title: 'Registro',
            text: mensaje,
            type: icono,
            showCancelButton: cancelBtn,
            showConfirmButton: confBtn,
            confirmButtonColor: colorBtn,
            confirmButtonText: textBtn,
            cancelButtonColor: colorBtn,
            cancelButtonText: textBtn,
            allowOutsideClick: false
          }).then((result) => {
            if (result.value) {
              $(location).attr('href', 'regempmastr.php?userid='+datos.ultimo_id);
            }
        });


//final sweetalert

      }
    });
  }
});

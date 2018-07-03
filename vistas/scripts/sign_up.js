$(document).ready(function() {
  /*$("#sign_up").submit(function (event) {
    if ((!$("#namesurname").length() < 4)) {
      return;
    }
  });*/
var sqlEmail ='';
  $('#password').keyup(function() {
    var password = $('#password').val();
    checkStrength(password);
  });

  $('#nombre').keyup(function () {
    var nombre = $('#nombre').val().length;
    var nameAllowed = checkName(nombre);
    console.log(nameAllowed);
  });

  $('#apellido').keyup(function () {
    var apellido = $('#apellido').val().length;
    var apellidoAllowed = checkName(apellido);
    console.log(apellidoAllowed);
  });
  $('#email').keyup(function () {
    var mailcheck = $('#email').val();
    validarEmail(mailcheck);
  });

function checkName(name) {

  if (name > 2) {
    var allowed = true;
  } else {
    var allowed = false;
  }
  return allowed;
}

function validarEmail(email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if (emailReg.test(email)) {
    $.post("../ajax/checkmail.php", {'email':email}, function (data){
      sqlEmail = data.existe;
    },"json");
    if (sqlEmail == 'true') {
      emailExist('true');

    } else {
      emailExist('false');
    }

  } else {
    emailExist('false');
  }
}


  function checkStrength(password) {
    var strength = 0
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
  }


});

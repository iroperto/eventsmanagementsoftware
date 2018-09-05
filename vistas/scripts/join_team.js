var max_fields = 5;
var wrapper = $("#container");
var add_button = $("#add");
var add_email;
var add_name;
var x = 1;
$(add_button).click(function(e) {
  e.preventDefault();
  add_email = $('#mailadd').val();
  add_name = $('#nameadd').val();
  $('#mailadd').val('');
  $('#nameadd').val('');


  if (x <= max_fields) {
    if (!(validarEmail(add_email))) {
      swal({
        type: 'error',
        title: 'E-mail invalido',
        text: 'Formato de correo electrónico invalido'
      });
    } else if (add_name == '') {
      swal({
        type: 'error',
        title: 'Nombre Invalido',
        text: 'Debe ingresar un Nombre para cada email agregado'
      });
    } else {
      $(wrapper).append('<div class="row"><div class="col-md-5">' + add_email + '<input type="hidden" name="emails[]" value="'+add_email+'"></div><div class="col-md-4">' + add_name + '<input type="hidden" name="nombres[]" value="'+add_name+'"></div><button class="btn btn-raised bg-deep-orange waves-effect" >Eliminar <i class="far fa-trash-alt"></i></button></div>');

      x++;
      deshabilitarAdd(x);

    }


  }
});

$(wrapper).on("click", ".remove_field", function(e) {
  e.preventDefault();
  $(this).parent('div').remove();
  x--;
  deshabilitarAdd(x);
});

function validarEmail(email) {
  var largoEmail = email.length + 1;
  if (largoEmail > 1) {
    var validmail;
    var emailReg = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,10}$/i;
    if (emailReg.test(email)) {
      validmail = true;
    } else {
      validmail = false;
    }
  }
  return validmail;
}

function deshabilitarAdd(lineas) {
  if (lineas >= 6) {
    $('#add').prop('disabled', true);
    $('#mailadd').prop('disabled', true);
  } else {
    $("#add").prop('disabled', false);
    $('#mailadd').prop('disabled', false);
    $('#mailadd').focus();
  }
}
function registrar(){
  var id_usuario = $("#usuario").val();
  $.post('../ajax/paso3reg.php?op=insertardata', {
    tabla: tabla,
    campo: campo,
    valor_campo: valor_campo,
    id_usuario: id_usuario
  }, function(data) {

    if (data.resultado) {
      $("#" + campo_validador).val('1');
    }

  }, "json");  
}

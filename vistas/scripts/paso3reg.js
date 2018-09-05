function toast_campos(mensaje, campo) {
  toastr.error(mensaje, campo);
}
var strength = 0;
var resultado;
$(document).ready(function() {
  popular('cant_empleados', 'qgb_empleados_user_opt', 'id_empleados_user', 'cantidad');

  popular('uso_software', 'qgb_objetivos_uso_opt', 'id_objetivos_uso_opt', 'objetivo');

  popular('rol_usuario', 'qgb_roles_usuarios_opt', 'id_role_usuario_opt', 'rol');

  $('#cant_empleados').select2({
    placeholder: "Selecciona una cantidad",
    minimumResultsForSearch: Infinity
  });
  $('#uso_software').select2({
    placeholder: "Selecciona una cantidad",
    minimumResultsForSearch: Infinity
  });
  $('#rol_usuario').select2({
    placeholder: "Selecciona una cantidad",
    minimumResultsForSearch: Infinity
  });



  $("#paso3reg").submit(function(event) {
    event.preventDefault();
    if (($('#cant_empleados').val() != '') && ($("#uso_software").val() != '') && ($('#rol_usuario').val() != '')) {
      registrar(event);
    } else if ($('#cant_empleados').val() === '') {
      toast_campos('Debe seleccionar una cantidad de empleados', 'Empleados');
      event.preventDefault();
    } else if ($("#uso_software").val() == '') {
      toast_campos('Debe indicar que uso le dara al software', 'Software');
      event.preventDefault();
    } else if ($('#rol_usuario').val() === '') {
      toast_campos('Debe proporcionar su rol en la empresa', 'Empresa');
      event.preventDefault();
    }
  });

  $("#registrar").click(function() {
    $("#paso3reg").submit();
  });

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
  };

  function registrar(e) {

    var rol = $('#rol_usuario').val();
    var cant_empleados = $('#cant_empleados').val();
    var uso_software = $('#uso_software').val();
    var id_usuario = $('#id_usuario').val();

    registrardatos('qgb_empleados_user', 'cantidad', cant_empleados, id_usuario, 'val_empleados');
    registrardatos('qgb_objetivos_uso', 'id_opt_objetivo_uso', uso_software, id_usuario, 'val_uso');
    registrardatos('qgb_roles_usuarios', 'id_role_opt', rol, id_usuario, 'val_rol');

    if (($("#val_empleados").val() == '1') && ($("#val_uso").val() == '1') && ($("#val_rol").val() == '1')) {
      $(location).attr('href', 'inv_equipo.php?userid='+$('#id_usuario').val());
    } else if ($('#val_empleados').val() != '1') {
      swal({
        type: 'error',
        title: 'Empleados',
        text: 'No se pudo registrar la cantidad de empleados'
      });
    } else if ($('#val_uso').val() != '1') {
      swal({
        type: 'error',
        title: 'Uso',
        text: 'No se registro el uso que desea'
      });
    } else if ($('#val_rol').val() != '1') {
      swal({
        type: 'error',
        title: 'Rol',
        text: 'No se registro el rol en la empresa'
      });
    }

  }

  function popular(select_field, tabla, id_key_name, text_name) {

    let dropdown = $("#" + select_field);

    $.post('../ajax/paso3reg.php?op=listar', {
      tabla: tabla,
      id_key_name: id_key_name,
      text_name: text_name
    }, function(data) {
      $.each(data, function(key, entry) {
        dropdown.append($('<option></option>').attr('value', entry.value).text(entry.texto));
      });
    }, "json");

  }

  function registrardatos(tabla, campo, valor_campo, id_usuario, campo_validador) {

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
});

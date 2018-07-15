function toast_campos(mensaje, campo) {
  toastr.error(mensaje, campo);
}
var strength = 0;

$(document).ready(function() {
  var nameAllowed = 'false';
  $("#emp_master").submit(function(event) {
    event.preventDefault();
    if ((!($('#url').val() === '')) && ($("#urlvalida").val() == 'si') && (!($('#empresa').val() === '')) && ($("#empresavalida").val() == 'si')) {
      registrar(event);

    } else if ($('#url').val() === '') {
      toast_campos('Debe proporcionar una dirección URL', 'Website');
      event.preventDefault();
    } else if ($("#urlvalida").val() == 'no') {
      toast_campos('Formato no valido o esta url existe', 'Website');
      $("#url").focus();
      $("#url").select();
      event.preventDefault();
    } else if ($('#empresa').val() === '') {
      toast_campos('Debe proporcionar una empresa', 'Empresa');
      $("#empresa").addClass('error-validacion');
      $("#empresa").focus();
      event.preventDefault();
    } else if ($("#empresavalida").val() != 'si') {
      toast_campos('El nombre de la empresa ya existe o es muy corto', 'Empresa');
      $("#empresa").focus();
      $("#empresa").select();
      event.preventDefault();
    }
  });

  $("#registrar").click(function() {
    $("#emp_master").submit();
  });

  $("#url").change(function () {
    var url = $("#url").val();
    validarUrl(url);
  });

  $('#empresa').keyup(function () {
    validarEmpr($(this).val());
  });
  function validarUrl(urlBusq) {
    var largoUrl = urlBusq.length + 1;

    if (largoUrl > 1) {

      var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
      var regex = new RegExp(expression);

      if (urlBusq.match(regex)) {
        $("#urlInvalida").hide('fast');
        $.post('../ajax/checkdatotabla.php',{campoid:'id_empresas_maestras',tabla:'qgb_empresas_maestras',campo:'url',valor:urlBusq},function (data) {

          if (data.existe == 'si') {
            $("#urlexist").show('fast');
            $("#url").addClass('red');
            $("#url").focus();
            $("#url").select();
            $('#urlvalida').val('no');
          } else {
            $("#urlexist").hide('fast');
            $('#urlInvalida').hide('fast');
            $('#urlvalida').val('si');
          }

        },"json");
      } else {
        $("#urlInvalida").show('fast');
        $("#urlexist").hide('fast');
        $("#url").focus();
        $("#url").select();
        $('#urlvalida').val('no');
      }

    } else{
      $('#urlvalida').val('no');
    }
  }

  function validarEmpr(empBusq) {

    var largoNombre = $('#empresa').val().length;

    if (largoNombre >= 3) {
       $.post('../ajax/checkdatotabla.php',{campoid:'id_empresas_maestras',tabla:'qgb_empresas_maestras',campo:'nombre',valor:empBusq},function (data) {

         if (data.existe == 'si') {
           $("#empresaexist").show('fast');
           $("#empresa").addClass('red');
           $("#empresa").focus();
           $("#empresa").select();
           $('#empresavalida').val('no');
         } else {
           $("#empresaexist").hide('fast');
           $('#empresavalida').val('si');
         }
       },"json");
    } else {
      $('#empresavalida').val('no');
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
    var formData = new FormData($("#emp_master")[0]);


    $.ajax({
      url: "../ajax/regempmaestra.php?op=insertar",
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
            title: 'Empresa',
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
              $(location).attr('href', 'paso3reg.php?userid='+$('#id_usuario').val());
            }
        });


//final sweetalert

      }
    });
  }
});

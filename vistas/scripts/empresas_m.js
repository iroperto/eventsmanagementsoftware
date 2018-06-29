var tabla;

//función que se ejecuta siempre al inicio
function init() {
  mostrarform(false);
  listar();
}

//Función limpiar
function limpiar() {
  $("#id_empresas_maestras").val("");
  $("#nombre").val("");
}

//function mostrar formulario
function mostrarform(flag) {
  if (flag) {
    $("#listadoregistros").hide();
    $("#formularioderegistros").show();
    $("#btnguardar").prop("disabled", false);
  } else {
    $("#listadoregistros").show();
    $("#formularioderegistros").hide();
    $("#btnguardar").prop("disabled", true);
  }
}

//Función Cancelar Formulario
function cancelarform() {
  limpiar();
  mostrarform(false);
}

//Función listado
function listar() {
  $("#tbllistado").dataTable({
    "aProsessing": true, //Activamos el procesamiento de datatables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tablas
    buttons:[
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdf'
    ],
    "ajax":{
      url: "../ajax/empresas_m.php?op=listar",
      type: 'get',
      dataType: "json",
      error: function(e){
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5,  //Paginacion
    "order": [[0, "desc"]] //Ordenar (columna, orden)
  }).DataTable()
}
init();

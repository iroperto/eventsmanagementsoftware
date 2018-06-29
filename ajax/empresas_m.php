<?php
require_once '../modelos/Empresas_m.php';

$empresa = new Empresas_m();

$id_empresas_maestras = isset($_POST['id_empresas_maestras'])? limpiarCadena($_POST['id_empresas_maestras']):"";
$nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";

switch ($_GET['op']) {
  case 'guardaryeditar':
    if (empty($id_empresas_maestras)) {
      $rspta = $empresa->insertar($nombre);
      echo $rspta ? "Empresa registrada" : "Empresa no se pudo registrar";
    } else {
      $rspta = $empresa->editar($id_empresas_maestras,$nombre);
      echo $rspta ? "Empresa actualizada" : "Empresa no se pudo actualizar";
    }
    break;
  case 'desactivar':
    $rspta = $empresa->desactivar($id_empresas_maestras);
    echo $rspta ? "Empresa desactivada" : "Empresa no se pudo desactivar";
    break;
  case 'activar':
    $rspta = $empresa->activar($id_empresas_maestras);
    echo $rspta ? "Empresa activada" : "Empresa no se pudo activar";
    break;
  case 'mostrar':
    $rspta = $empresa->mostrar($id_empresas_maestras);
    //Codificamos el resultado usando json
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $empresa->listar();
    //Declaramos un array
    $data = array();

    while ($reg=$rspta->fetch_object()) {
      $data[] = array(
        '0' => $reg->id_empresas_maestras,
        '1' => $reg->nombre,
        '2' => $reg->activado,
      );
    }
    $results = array(
      "sEcho"=>1, //Información para datatable
      "iTotalRecords"=>count($data), //Enviamos el total de registros al datatable
      "iTotalDisplayRecords"=>count($data), //Enviamos el total de registros a visualizar
      "aaData"=>$data
    );
    echo json_encode($results);
    break;
}
?>

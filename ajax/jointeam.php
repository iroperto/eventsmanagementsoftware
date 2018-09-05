<?php
require_once '../modelos/Join_Team.php';

$join_t = new Join_team();

$usuario = isset($_POST['usuario'])?limpiarCadena($_POST['usuario']):"";
$id_activar = isset($_POST['id_activar'])?limpiarCadena($_POST['id_activar']):"";
$emails = isset($_POST['emails'])?limpiarCadena($_POST['emails']):"";
$nombres = isset($_POST['nombres'])?limpiarCadena($_POST['nombres']):"";

switch ($_GET['op']) {
  case 'insert_usr_ver':
      $rspta = $join_t->insertar($usuario);
      $resultado = array('resultado' => $rspta );
      echo json_encode($resultado);
    break;
    case 'insert_usr_ref':
      $emails = array_values($emails);
      $nombres = array_values($nombres);
      $cantidad = count($emails);
      $resultado = [];
      for ($i=0; $i < $cantidad; $i++) {
        $rspta = $join_t->insertar_ref($usuario, $emails[$i], $nombres[$i]);
        $resultado += ['resultado'.$i => $rspta];
      }
      echo json_encode($resultado);
    break;
  case 'desactivar':
    $rspta = $join_t->desactivar($usuario);
    echo $rspta ? "Empresa desactivada" : "Empresa no se pudo desactivar";
    break;
  case 'activar':
    $rspta = $join_t->activar($usuario);
    echo $rspta ? "Empresa activada" : "Empresa no se pudo activar";
    break;
  case 'mostrar':
    $rspta = $join_t->seleccionar('23');
    // $rspta = $join_t->seleccionar($usuario);
    //Codificamos el resultado usando json
    echo json_encode($rspta);
    break;
}
?>

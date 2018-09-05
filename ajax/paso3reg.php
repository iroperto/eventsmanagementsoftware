<?php
require_once '../modelos/Paso3reg.php';

$empresa = new pasoTresReg();

$tabla = isset($_POST['tabla'])?limpiarCadena($_POST['tabla']):"";
$campo = isset($_POST['campo'])?limpiarCadena($_POST['campo']):"";
$valor_campo = isset($_POST['valor_campo'])?limpiarCadena($_POST['valor_campo']):"";
$activado = isset($_POST['activado'])?limpiarCadena($_POST['activado']):"";
$id_key_name = isset($_POST['id_key_name'])?limpiarCadena($_POST['id_key_name']):"";
$id = isset($_POST['id'])?limpiarCadena($_POST['id']):"";
$text_name = isset($_POST['text_name'])?limpiarCadena($_POST['text_name']):"";
$id_usuario = isset($_POST['id_usuario'])?limpiarCadena($_POST['id_usuario']):"";

switch ($_GET['op']) {
  case 'insertaropt':
      $rspta = $empresa->insertaropt($tabla, $campo, $valor_campo, $activado);
      echo $rspta ? "Opción registrada" : "Opción no se pudo registrar";
    break;
  case 'insertardata':
      $rspta = $empresa->insertardata($tabla, $campo, $valor_campo, $id_usuario);
      $resultado = array('resultado' => $rspta );

      echo json_encode($resultado);
      // echo $rspta ;
    break;
  case 'desactivar':
    $rspta = $empresa->desactivar($tabla, $id_key_name, $id);
    echo $rspta ? "Empresa desactivada" : "Empresa no se pudo desactivar";
    break;
  case 'activar':
    $rspta = $empresa->activar($tabla, $id_key_name, $id);
    echo $rspta ? "Empresa activada" : "Empresa no se pudo activar";
    break;
  case 'mostrar':
    $rspta = $empresa->mostrar($tabla, $id_key_name, $id);
    //Codificamos el resultado usando json
    echo json_encode($rspta);
    break;
  case 'listar':
    $rspta = $empresa->listar($tabla, $id_key_name, $text_name);

      echo json_encode($rspta);

    break;
}
?>

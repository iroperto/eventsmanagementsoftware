<?php
require '../config/Connection.php';

$email = limpiarCadena($_POST['email']);
$sql = "SELECT IF(correo='$email', 'si', 'no') AS existe FROM qgb_usuarios";

$result = ejecutarConsultaSimpleFila($sql);
echo json_encode($result);
?>

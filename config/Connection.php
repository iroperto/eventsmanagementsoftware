<?php
//Incluimos los valores globales del proyecto
require_once 'global.php';

header("Content-Type: text/html;charset=utf-8");

$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query($connection, 'SET NAMES "'.DB_ENCODE.'"');

mysqli_query($connection, "SET CHARACTER_SET_CLIENT='".DB_ENCODE."'");

mysqli_query($connection, "SET CHARACTER_SET_RESULTS='".DB_ENCODE."'");

mysqli_query($connection, "SET CHARACTER_SET_CONNECTION='".DB_ENCODE."'");

mysqli_query($connection, "SELECT convert(cast(convert(content using latin1) as binary) using utf8) AS content");

//Mostramos un posible error en la conexion
if (mysqli_connect_errno()) {
  printf("Falló la conexion a la base de datos: %s\n" , mysqli_connect_error());
  exit();
}

if (!function_exists('ejecutarConsulta')) {
  function ejecutarConsulta($sql)
  {
    global $connection;
    $query = $connection->query($sql);
    return $query;
  }

  function ejecutarConsultaMultiplesFilas($sql)
  {
    global $connection;
    $query = $connection->query($sql);

    $rows = array();

    while($row = $query->fetch_array()) {
             $rows[] = array('value'=>$row['value'], 'texto'=> $row['texto']);
     }

    return $rows;
  }

  function ejecutarConsultaSimpleFila($sql)
  {
    global $connection;
    $query = $connection->query($sql);
    $row = $query->fetch_assoc();
    return $row;
  }

  function ejecutarConsulta_retornarID($sql)
  {
    global $connection;
    $query = $connection->query($sql);
    return $connection->insert_id;
  }

  function limpiarCadena($str)
  {
    global $connection;
    $str = mysqli_real_escape_string($connection, trim($str));
    return htmlspecialchars($str);
  }

  function BuscarExistencia($campoid,$tabla,$campo,$valor)
  {
    global $connection;
    $sql = "SELECT $campoid FROM $tabla WHERE $campo = LOWER('$valor')";
    $query = $connection->query($sql);
    if ($query->num_rows == 0) {
      $result = array('existe'=>'no');
    } else {
      $result = array('existe'=>'si');
    }
    return $result;

  }
}
?>

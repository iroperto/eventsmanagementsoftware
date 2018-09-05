<?php
//Incluimos inicialmente la conexión a la base de datos
require '../config/Connection.php';


Class pasoTresReg
{
  //Implementamos nuestro constructor
  public function __construct()
  {
    // code...
  }

  //Implementamos un metodo para insertar opciones
  public function insertaropt($tabla, $campo, $valor_campo, $activado)
  {
    $sql = "INSERT INTO `$tabla` (`$campo`, `activado`) VALUES ('$valor_campo', '$activado')";
    return ejecutarConsulta($sql);
  }
  //Implementamos un metodo para insertar datos
  public function insertardata($tabla, $campo, $valor_campo, $id_usuario)
  {
    $sql = "INSERT INTO $tabla (id_usuario, $campo) VALUES ('$id_usuario', '$valor_campo')";
    return ejecutarConsulta($sql);
  }
  //Implementamos un metodo para desactivar las opciones
  public function desactivar($tabla, $id_key_name, $id)
  {
    $sql = "UPDATE $tabla SET activado = '0' WHERE $id_key_name = '$id'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para activar las Opciones
  public function activar($tabla, $id_key_name, $id)
  {
    $sql = "UPDATE $tabla SET activado = '1' WHERE $id_key_name = '$id'";
    return ejecutarConsulta($sql);
  }

  //Implementar un metodo para mostrar los datos de un registro a modificar
  public function mostrar($tabla, $id_key_name, $id)
  {
    $sql = "SELECT * FROM $tabla WHERE $id_key_name = '$id'";
    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementamos un metodo para listar los registros
  public function listar($tabla, $id_key_name, $text_name)
  // public function listar($tabla, $id_key_name, $text_name)
  {
    $sql = "SELECT $id_key_name AS 'value', $text_name AS 'texto' FROM $tabla WHERE activado = '1'";
    return ejecutarConsultaMultiplesFilas($sql);
  }
}

?>

<?php
//Incluimos inicialmente la conexión a la base de datos
require '../config/Connection.php';

Class Empresas_m
{
  //Implementamos nuestro constructor
  public function __construct()
  {
    // code...
  }

  //Implementamos un metodo para insertar registros
  public function insertar($nombre)
  {
    $sql = "INSERT INTO qgb_empresas_maestras (nombre) VALUES ('$nombre')";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para editar registros
  public function editar($id_empresas_maestras,$nombre)
  {
    $sql = "UPDATE qgb_empresas_maestras SET nombre = '$nombre' WHERE id_empresas_maestras = '$id_empresas_maestras'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para desactivar las Empresas
  public function desactivar($id_empresas_maestras)
  {
    $sql = "UPDATE qgb_empresas_maestras SET activado = '0' WHERE id_empresas_maestras = '$id_empresas_maestras'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para activar las Empresas
  public function activar($id_empresas_maestras)
  {
    $sql = "UPDATE qgb_empresas_maestras SET activado = '1' WHERE id_empresas_maestras = '$id_empresas_maestras'";
    return ejecutarConsulta($sql);
  }

  //Implementar un metodo para mostrar los datos de un registro a modificar
  public function mostrar($id_empresas_maestras)
  {
    $sql = "SELECT * FROM qgb_empresas_maestras WHERE id_empresas_maestras = '$id_empresas_maestras'";
    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementamos un metodo para listar los registros
  public function listar()
  {
    $sql = "SELECT * FROM qgb_empresas_maestras";
    return ejecutarConsulta($sql);
  }
}

?>

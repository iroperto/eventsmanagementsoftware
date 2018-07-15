<?php
//Incluimos inicialmente la conexión a la base de datos
require '../config/Connection.php';

Class registro
{
  //Implementamos nuestro constructor
  public function __construct()
  {
    // code...
  }

  //Implementamos un metodo para insertar registros
  public function insertar($nombre, $apellido, $correo, $password, $nivel_usuario)
  {
    $sql = "INSERT INTO `qgb_usuarios` (`nombre`, `apellido`, `correo`, `password`, `nivel_usuario`) VALUES ('$nombre', '$apellido', '$correo', '$password','$nivel_usuario')";
    return ejecutarConsulta_retornarID($sql);    
  }

  //Implementamos un metodo para editar registros
  public function nombre_apellido($id_usuarios,$nombre, $apellido)
  {
    $sql = "UPDATE qgb_usuarios SET nombre = '$nombre', apellido = '$apellido' WHERE id_usuarios = '$id_usuarios'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para desactivar las Empresas
  public function desactivar($id_usuarios)
  {
    $sql = "UPDATE qgb_usuarios SET activado = '0' WHERE id_usuarios = '$id_usuarios'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para activar las Empresas
  public function activar($id_usuarios)
  {
    $sql = "UPDATE qgb_usuarios SET activado = '1' WHERE id_usuarios = '$id_usuarios'";
    return ejecutarConsulta($sql);
  }

  //Implementar un metodo para mostrar los datos de un registro a modificar
  public function mostrar($id_usuarios)
  {
    $sql = "SELECT * FROM qgb_usuarios WHERE id_usuarios = '$id_usuarios'";
    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementamos un metodo para listar los registros
  public function listar()
  {
    $sql = "SELECT * FROM qgb_usuarios";
    return ejecutarConsulta($sql);
  }
}

?>

<?php
//Incluimos inicialmente la conexión a la base de datos
require '../config/Connection.php';

Class Join_team
{
  //Implementamos nuestro constructor
  public function __construct()
  {
    // code...
  }

  //Implementamos un metodo para insertar la verificacion
  public function insertar($id)
  {
    $code=substr(md5(mt_rand()),0,165);
    $sql = "INSERT INTO qgb_activar_usuario (id_usuario, hash) VALUES ('$id', '$code')";
    return ejecutarConsulta($sql);
  }
  //Implementamos un metodo para insertar los referidos
  public function insertar_ref($id_usuario, $email, $nombre)
  {
    $sql = "INSERT INTO qgb_referidos_usuario (id_usuario, correo, nombre) VALUES ('$id_usuario', '$email', '$nombre')";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para seleccionar registros
  public function seleccionar($id_usuario)
  {
    $sql = "SELECT * FROM qgb_activar_usuario WHERE id_usuario = '$id_usuario'";
    return ejecutarConsultaSimpleFila($sql);
  }

  //Implementamos un metodo para desactivar el usuario
  public function desactivar($id_activar_usuario)
  {
    $sql = "UPDATE qgb_activar_usuario SET activo = '0' WHERE id_activar_usuario = '$id_activar_usuario'";
    return ejecutarConsulta($sql);
  }

  //Implementamos un metodo para activar el usuario
  public function activar($id_activar_usuario)
  {
    $sql = "UPDATE qgb_activar_usuario SET activo = '1' WHERE id_activar_usuario = '$id_activar_usuario'";
    return ejecutarConsulta($sql);
  }

}

?>

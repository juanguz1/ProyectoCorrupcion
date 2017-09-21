<?php

class ciudadanoModel
{
  private $username;
  private $password;
  private $db;
  private $connection;
  function __construct(){
    $this->username="root";
    $this->password="root";
    $this->db="corrupcion";
    $this->connection = new mysqli("127.0.0.1",$this->username,$this->password,$this->db);
    if(mysqli_connect_errno()){
      echo mysqli_connect_error();
    }
    $this->connection->query("SET NAMES 'utf8'");
}

  function select_all_ciudadanos(){
    $query = 'SELECT * FROM CIUDADANO';
	$tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $ciudadanos = $this->connection->query($query);
	//print_r($ciudadanos);
    return $ciudadanos ? $ciudadanos:array();
  }

  function registra_ciudadano($idCiudadano,$Nombre,$ApellidoPaterno,$ApellidoMaterno,$FechaNacimiento,$Calle,$Numero,$Colonia,$Municipio,$Estado,$Pais,$Patrimonio){
  $query="INSERT INTO CIUDADANO  VALUES ('$idCiudadano','$Nombre','$ApellidoPaterno','$ApellidoMaterno','$FechaNacimiento','$Calle','$Numero','$Colonia','$Municipio','$Estado','$Pais','$Patrimonio')";
  $this->connection->query($query);
}
}

<?php

class casoModel
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

  function select_all_casos(){
    $query = 'SELECT * FROM caso;';
	$tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $casos = $this->connection->query($query);
    return $casos ? $casos:array();
  }

  function registra_caso($idCaso,$NombreCaso,$Descripcion,$Desvio,$PaisOrigen,$idPeriodico,$FechaDescubrimiento,$Dictamen){
  $query="INSERT INTO caso VALUES ('$idCaso','$NombreCaso','$Descripcion','$Desvio','$PaisOrigen','$idPeriodico','$FechaDescubrimiento','$Dictamen')";
  $this->connection->query($query);
  }


}

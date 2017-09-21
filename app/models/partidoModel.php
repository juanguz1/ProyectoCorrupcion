<?php

class partidoModel
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

  function select_all_partidos(){
    $query = 'select * from partido';
	$tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $partidos = $this->connection->query($query);
    return $partidos ? $partidos:array();
  }

  function registra_partido($NombrePartido,$CallePartido,$NumeroPartido,$ColoniaPartido,$MunicipioPartido,$EstadoPartido,$PaisPartido){
  $query="INSERT INTO Partido VALUES ('$NombrePartido','$CallePartido','$NumeroPartido','$ColoniaPartido','$MunicipioPartido','$EstadoPartido','$PaisPartido')";
  $this->connection->query($query);
}



}

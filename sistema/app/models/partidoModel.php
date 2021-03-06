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

function registrar_partido($NombrePartido,$CallePartido,$NumeroPartido,$ColoniaPartido,$MunicipioPartido,$EstadoPartido,$PaisPartido,$NumeroTel){
$query="INSERT INTO PARTIDO  VALUES ('$NombrePartido','$CallePartido','$NumeroPartido','$ColoniaPartido','$MunicipioPartido','$EstadoPartido','$PaisPartido','$NumeroTel')";
$this->connection->query($query);
}


function registrar_partidoperidoco($NombrePartido,$idPeriodico){
  $query="INSERT INTO PARTIDOPERIODICO  VALUES ('$NombrePartido','$idPeriodico')";
  $this->connection->query($query);

}
  function select_all_partidos(){
    $query = 'select * from partido';
	$tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $partidos = $this->connection->query($query);
    return $partidos ? $partidos:array();
  }

  function select_names_partido(){
    $query = 'select NombrePartido from partido';
  $tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $partidos = $this->connection->query($query);
    return $partidos ? $partidos:array();

  }

  function select_telefonos($NombrePartido){
    $query = "select TelefonoPartido from telefonopartido where NombrePartido = '{$NombrePartido}'";
  echo $query;
  $tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $telefonopartido = $this->connection->query($query);
    return $telefonopartido ? $telefonopartido:array();
  }

  function consulta_actualizar($NombrePartido){
        $query = "select * from partido where NombrePartido='{$NombrePartido}'";
        $consulta_actualizar = $this->connection->query($query);
        return $consulta_actualizar ? $consulta_actualizar : array();
  }

  function update_partido($NombrePartido,$TelefonoPartido, $CallePartido, $NumeroPartido, $ColoniaPartido, $MunicipioPartido, $EstadoPartido, $PaisPartido){
    $query = "UPDATE partido set CallePartido='{$CallePartido}', TelefonoPartido='{$TelefonoPartido}', NumeroPartido='{$NumeroPartido}', ColoniaPartido='{$ColoniaPartido}', MunicipioPartido='{$MunicipioPartido}', EstadoPartido='{$EstadoPartido}' WHERE NombrePartido = '{$NombrePartido}'";
    if($this->connection->query($query) === TRUE){
      $res="Actualizado";
    }else{
       $res=$this->connection->error;
      }
      return $res;
  }

  function delete_partido($NombrePartido){
        $query = "DELETE FROM partido WHERE NombrePartido='{$NombrePartido}'";
    if($this->connection->query($query) === TRUE){
      $res="Borrado";
    }else{
       $res=$this->connection->error;
      }
      echo $res;
      return $res;
    }
}

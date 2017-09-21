<?php

class periodicoModel
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

  function select_all_periodicos(){
    $query = 'SELECT * FROM PERIODICO';
	$tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $periodicos = $this->connection->query($query);
    return $periodicos ? $periodicos:array();
  }

  function select_names_periodicos(){
    $query = 'SELECT NombrePeriodico FROM PERIODICO';
    $tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $periodicos = $this->connection->query($query);
    return $periodicos ? $periodicos:array();
  }

  function registra_periodico($NombrePeriodico,$CallePeriodico,$NumeroPeriodico,$ColoniaPeriodico,$MunicipioPeriodico,$EstadoPeriodico,$PaisPeriodico,$Tiraje){
  $query="INSERT INTO Periodico  VALUES ('$NombrePeriodico','$CallePeriodico','$NumeroPeriodico','$ColoniaPeriodico','$MunicipioPeriodico','$EstadoPeriodico','$PaisPeriodico','$Tiraje')";
  $this->connection->query($query);
}
  
  function consulta_actualizar($NombrePeriodico){
        $query = "select * from periodico where NombrePeriodico='{$NombrePeriodico}'";
        $consulta_actualizar = $this->connection->query($query);
        return $consulta_actualizar ? $consulta_actualizar : array();      
  }
  
  function update_periodico($NombrePeriodico,$Tiraje, $CallePeriodico, $NumeroPeriodico, $ColoniaPeriodico, $MunicipioPeriodico, $EstadoPeriodico, $PaisPeriodico){
    $query = "UPDATE periodico set Tiraje='{$Tiraje}', CallePeriodico='{$CallePeriodico}', NumeroPeriodico='{$NumeroPeriodico}', ColoniaPeriodico='{$ColoniaPeriodico}', MunicipioPeriodico='{$MunicipioPeriodico}', EstadoPeriodico='{$EstadoPeriodico}' WHERE NombrePeriodico = '{$NombrePeriodico}'";
    if($this->connection->query($query) === TRUE){
      $res="Actualizado";
    }else{
       $res=$this->connection->error;
      }
      return $res; 
  }
  
  function delete_periodico($NombrePeriodico){
        $query = "DELETE FROM periodico WHERE NombrePeriodico='{$NombrePeriodico}'";
    if($this->connection->query($query) === TRUE){
      $res="Borrado";
    }else{
       $res=$this->connection->error;
      }
      echo $res;
      return $res;    
    }

}

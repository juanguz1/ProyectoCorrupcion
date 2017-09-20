<?php

class juezModel
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

  function select_all_jueces(){
    $query = 'select juez.idJuez, ciudadano.Nombre, ciudadano.ApellidoPaterno, ciudadano.ApellidoMaterno, juez.FechaComienzo from juez inner join ciudadano on juez.idJuez=ciudadano.idCiudadano';
	$tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $jueces = $this->connection->query($query);
    return $jueces ? $jueces:array();
  }
  
  function consulta_actualizar($idJuez){
        $query = "select juez.idJuez, ciudadano.Nombre, ciudadano.ApellidoPaterno, ciudadano.ApellidoMaterno, 
					juez.FechaComienzo from juez inner join ciudadano on juez.idJuez=ciudadano.idCiudadano  
					where juez.idJuez='{$idJuez}'";
        $consulta_actualizar = $this->connection->query($query);
        return $consulta_actualizar ? $consulta_actualizar : array();      
    }
	
   function update_juez($idJuez,$Nombre,$ApellidoPaterno,$ApellidoMaterno,$FechaComienzo){
        $query = "UPDATE juez set FechaComienzo = '{$FechaComienzo}' WHERE idJuez = '{$idJuez}'";
		if($this->connection->query($query) === TRUE){
			$res="Actualizado";
		}else{
			 $res=$this->connection->error;
		  }
      return $res; 
    }
	
	function delete_juez($idJuez){
        $query = "DELETE FROM juez WHERE idJuez='{$idJuez}'";
		if($this->connection->query($query) === TRUE){
			$res="Borrado";
		}else{
			 $res=$this->connection->error;
		  }
		  echo $res;
      return $res;    
    }
} 
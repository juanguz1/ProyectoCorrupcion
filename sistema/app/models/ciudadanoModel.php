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

  function select_datos_ciudadanos(){
    $query = 'select idCiudadano, Nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, Patrimonio from ciudadano';
    echo $query;
    $tildes = $this->connection->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $ciudadanos = $this->connection->query($query);
    return $ciudadanos ? $ciudadanos:array();
  }
  
  function select_direccion_ciudadanos($idCiudadano){
    $query = "select idCiudadano, Calle, Numero, Colonia, Municipio, Estado, Pais from ciudadano where idCiudadano='{$idCiudadano}'";
    $tildes = $this->connection->query("SET NAMES 'utf8'");
    $direccion = $this->connection->query($query);
    return $direccion ? $direccion:array();
  }
  
  function consulta_actualizar($idCiudadano){
        $query = "select * from ciudadano where idCiudadano='{$idCiudadano}'";
        $consulta_actualizar = $this->connection->query($query);
        return $consulta_actualizar ? $consulta_actualizar : array();      
  }
  
  function update_ciudadano($idCiudadano,$Nombre,$ApellidoPaterno,$ApellidoMaterno,$FechaNacimiento, $Patrimonio, $Calle, $Numero, $Colonia, $Municipio, $Estado, $Pais){
    $query = "UPDATE ciudadano set Nombre='{$Nombre}', ApellidoPaterno='{$ApellidoPaterno}', 
          ApellidoMaterno='{$ApellidoMaterno}', FechaNacimiento='{$FechaNacimiento}',
          Calle='{$Calle}', Numero='{$Numero}', Colonia='{$Colonia}', Municipio='{$Municipio}',
          Estado='{$Estado}', Pais='{$Pais}', Patrimonio='{$Patrimonio}' WHERE idCiudadano = '{$idCiudadano}'";
    if($this->connection->query($query) === TRUE){
      $res="Actualizado";
    }else{
       $res=$this->connection->error;
      }
      return $res; 
    }
  
  function delete_ciudadano($idCiudadano){
        $query = "DELETE FROM ciudadano WHERE idCiudadano='{$idCiudadano}'";
    if($this->connection->query($query) === TRUE){
      $res="Borrado";
    }else{
       $res=$this->connection->error;
      }
      echo $res;
      return $res;    
    }

}

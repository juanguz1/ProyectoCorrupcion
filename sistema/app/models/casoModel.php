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

  function select_descripcion_caso($idCaso){
    $query = "select idCaso, Descripcion from caso where idCaso='{$idCaso}'";
    $tildes = $this->connection->query("SET NAMES 'utf8'");
    $caso = $this->connection->query($query);
    return $caso ? $caso:array();
  }

  function consulta_actualizar($idCaso){
        $query = "select * from caso where idCaso='{$idCaso}'";
        $consulta_actualizar = $this->connection->query($query);
        return $consulta_actualizar ? $consulta_actualizar : array();
  }

  function update_caso($idCaso,$NombreCaso,$Descripcion,$Desvio,$PaisOrigen, $idPeriodico, $FechaDescubrimiento, $Dictamen){
    $query = "UPDATE caso set NombreCaso='{$NombreCaso}', Descripcion='{$Descripcion}', Desvio='{$Desvio}',
        PaisOrigen='{$PaisOrigen}',FechaDescubrimiento='{$FechaDescubrimiento}', Dictamen='{$Dictamen}'
        WHERE idCaso = '{$idCaso}'";
    if($this->connection->query($query) === TRUE){
      $res="Actualizado";
    }else{
       $res=$this->connection->error;
      }
      return $res;
    }

  function delete_caso($idCaso){
        $query = "DELETE FROM caso WHERE idCaso='{$idCaso}'";
    if($this->connection->query($query) === TRUE){
      $res="Borrado";
    }else{
       $res=$this->connection->error;
      }
      echo $res;
      return $res;
    }

    function consulta_casos(){

            $query = "select idCaso, NombreCaso From caso" ;
            $casos = $this->connection->query($query);
            return $casos ? $casos : array();
        }

        function registra_implicado($idCiudadano,$idCaso,$Cargo){

                $query = "INSERT INTO casociudadano VALUES ('$idCaso','$idCiudadano','$Cargo')" ;
               $this->connection->query($query);

            }

  function listar_implicado($idCaso){
      $query="SELECT concat(ciudadano.Nombre,' ',ciudadano.ApellidoPaterno,' ', ciudadano.ApellidoMaterno) AS NombreCompleto,ciudadano.Pais, ciudadano.Patrimonio FROM Ciudadano INNER JOIN casociudadano ON ciudadano.idCiudadano=casociudadano.idCiudadano WHERE casociudadano.idCaso='$idCaso'";
      $implicados= $this->connection->query($query);
      return $implicados ? $implicados:array();
  }

  function delete_ciudadanocaso($idCiudadano,$idCaso){
    $query = "DELETE FROM casociudadano WHERE idCaso='{$idCaso}' and idCiudadano='{$idCiudadano}'";
    if($this->connection->query($query) === TRUE){
      $res="Borrado";
    }else{
       $res=$this->connection->error;
    }
      echo $res;
      return $res;
  }


}

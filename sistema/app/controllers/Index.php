<?php 
class Index extends Controller
{
  private $response;
  private $usuarioModel;
  private $modelo_juez;
  private $modelo_ciudadano;
  function __construct(){
    //$this->usuarioModel = $this->model('usuarioModel');
	$this->modelo_juez = $this->model('juezModel');
	$this->modelo_ciudadano = $this->model('ciudadanoModel');
  }
  
  function caso(){
	   $this->view('caso/insertar_caso');
  }
  
  function ciudadano(){
	   $this->view('ciudadano/insertar_ciudadano');
  }
  
  function juez(){
	   $this->view('juez/insertar_juez');
  }
  
  function periodico(){
	  $this->view('periodico/insertar_periodico');
  }
  
  function partido(){
	  $this->view('partido/insertar_partido');
  }
  
  ///////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////*CASOS*/////////////////////////////////////////////////
  public function Ver_Casos(){
    $EE_modelo = $this->model('casoModel');
	$casos = $EE_modelo->select_all_casos();
	$this->view('caso/mostrar_casos', ['casos'=>$casos]);
  }
  
  //////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////*CIUDADANOS*////////////////////////////////////////////
  /*public function Ver_Ciudadanos(){
    $EE_modelo = $this->model('ciudadanoModel');
	$ciudadanos = $EE_modelo->select_all_ciudadanos();
	$this->view('ciudadano/mostrar_ciudadanos', ['ciudadanos'=>$ciudadanos]);
  }*/
  public function Ver_Ciudadanos(){
	  $ciudadanos = $this->modelo_ciudadano->select_datos_ciudadanos();
	  $this->view('ciudadano/gestionar_ciudadano', ['ciudadanos'=>$ciudadanos]);
  }
  
  public function Direccion_Ciudadanos($idCiudadano){
	  $consulta_actualiza = $this->modelo_ciudadano->select_direccion_ciudadanos($idCiudadano);
	  $direccion = $consulta_actualiza->fetch_object();
      die(json_encode(array('idCiudadano'=>$direccion->idCiudadano,'Calle'=>$direccion->Calle,'Numero'=>$direccion->Numero,'Colonia'=>$direccion->Colonia,'Municipio'=>$direccion->Municipio,'Estado'=>$direccion->Estado,'Pais'=>$direccion->Pais)));
  }
  
  public function actualizar_Ciudadano($idCiudadano){
        $consulta_actualiza = $this->modelo_ciudadano->consulta_actualizar($idCiudadano);
        $ciudadano = $consulta_actualiza->fetch_object();
        die(json_encode(array('idCiudadano'=>$ciudadano->idCiudadano,'Nombre'=>$ciudadano->Nombre,'ApellidoPaterno'=>$ciudadano->ApellidoPaterno,'ApellidoMaterno'=>$ciudadano->ApellidoMaterno,'FechaNacimiento'=>$ciudadano->FechaNacimiento,'Patrimonio'=>$ciudadano->Patrimonio,'Calle'=>$ciudadano->Calle,'Numero'=>$ciudadano->Numero,'Colonia'=>$ciudadano->Colonia,'Municipio'=>$ciudadano->Municipio,'Estado'=>$ciudadano->Estado,'Pais'=>$ciudadano->Pais)));
  }
	
  public function actualizaCiudadano(){
		$resul = $this->modelo_ciudadano->update_ciudadano($_POST["idCiudadano1"],$_POST["Nombre1"],$_POST["ApellidoPaterno1"],$_POST["ApellidoMaterno1"],$_POST["FechaNacimiento1"], $_POST["Patrimonio1"],$_POST["Calle1"],$_POST["Numero1"],$_POST["Colonia1"],$_POST["Municipio1"], $_POST["Estado1"],$_POST["Pais1"]);
		echo $resul;	
		return $resul;
  }
  
  public function borraCiudadano($idCiudadano){
		$resul = $this->modelo_ciudadano->delete_ciudadano($idCiudadano);
		return $resul;
	}
  
  ///////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////*JUEZ*/////////////////////////////////////////////
  public function Ver_Jueces(){
    $EE_modelo = $this->model('JuezModel');
	$jueces = $EE_modelo->select_all_jueces();
	$this->view('juez/gestionar_juez', ['jueces'=>$jueces]);
  }
  
  //Recibe informacion y la manda al modal
    public function actualizar_Juez($idJuez){
        $consulta_actualiza = $this->modelo_juez->consulta_actualizar($idJuez);
        $juez = $consulta_actualiza->fetch_object();
        die(json_encode(array('idJuez'=>$juez->idJuez,'Nombre'=>$juez->Nombre,'ApellidoPaterno'=>$juez->ApellidoPaterno,'ApellidoMaterno'=>$juez->ApellidoMaterno,'FechaComienzo'=>$juez->FechaComienzo)));
    }
	
    //Actualiza informacion de  Juez
	public function actualizaJuez(){
		$resul = $this->modelo_juez->update_juez($_POST["idJuez"],$_POST["Nombre"],$_POST["ApellidoPaterno"],$_POST["ApellidoMaterno"],$_POST["FechaComienzo"]);
		echo $resul;	
		return $resul;
	}
	
	//Borra juez
	public function borraJuez($idJuez){
		$resul = $this->modelo_juez->delete_juez($idJuez);
		return $resul;
	}
	
  //////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////*PERIODICO*////////////////////////////////////////
  public function Ver_Periodicos(){
    $EE_modelo = $this->model('periodicoModel');
	$periodicos = $EE_modelo->select_all_periodicos();
	$this->view('periodico/mostrar_periodicos', ['periodicos'=>$periodicos]);
  }
  
  ///////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////*PARTIDO*///////////////////////////////////////
  public function Ver_Partidos(){
    $EE_modelo = $this->model('partidoModel');
	$partidos = $EE_modelo->select_all_partidos();
	$this->view('partido/mostrar_partidos', ['partidos'=>$partidos]);
  }
  
  //////////////////////////////////////////////////////////////////////////////////////

  function inicio(){
    header("Location: ". "/ProyectoCorrupcion/sistema/public/");
  }
}
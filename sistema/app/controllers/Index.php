<?php
class Index extends Controller
{
  private $response;
  private $usuarioModel;
  private $modelo_jefa;
  function __construct(){
    //$this->usuarioModel = $this->model('usuarioModel');
	$this->modelo_juez = $this->model('juezModel');
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

  public function Antes_Caso(){
    $EE_modelo=$this->model('periodicoModel');
    $periodicos=$EE_modelo->select_names_periodicos();
    $this->view('caso/insertar_caso', ['periodicos'=>$periodicos]);
  }

  public function Agregar_Caso(){
    $postdata=file_get_contents("php://input");
    $request=json_decode($postdata);
    $EE_modelo=$this->model('casoModel');
    $EE_modelo->registra_caso($_POST["idCaso"],$_POST["NombreCaso"],$_POST["Descripcion"],$_POST["Desvio"],$_POST["PaisOrigen"],$_POST["idPeriodico"],$_POST["FechaDescubrimiento"],$_POST["Dictamen"]);
    $this->view('caso/insertar_caso', ['periodicos'=>$periodicos]);
  }

  //////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////*CIUDADANOS*////////////////////////////////////////////
  public function Ver_Ciudadanos(){
    $EE_modelo = $this->model('ciudadanoModel');
	$ciudadanos = $EE_modelo->select_all_ciudadanos();
	$this->view('ciudadano/mostrar_ciudadanos', ['ciudadanos'=>$ciudadanos]);
  }


  public function Agregar_Ciudadano(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo = $this->model('ciudadanoModel');
    $EE_modelo->registra_ciudadano($_POST["idCiudadano"],$_POST["Nombre"],$_POST["ApellidoPaterno"],$_POST["ApellidoMaterno"],$_POST["FechaNacimiento"],$_POST["Calle"],$_POST["Numero"],$_POST["Colonia"],$_POST["Municipio"],$_POST["Estado"],$_POST["Pais"],$_POST["Patrimonio"]);
     $this->view('ciudadano/insertar_ciudadano');
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

	public function borraJuez($idJuez){
		$resul = $this->modelo_juez->delete_juez($idJuez);
        //$juez = $consulta_borra->fetch_object();
        //die(json_encode(array('idJuez'=>$juez->idJuez,'Nombre'=>$juez->Nombre,'ApellidoPaterno'=>$juez->ApellidoPaterno,'ApellidoMaterno'=>$juez->ApellidoMaterno,'FechaComienzo'=>$juez->FechaComienzo)));0
		//$resul = $this->modelo_juez->delete_juez($_POST["idJuez"]);
		//echo $resul;
		return $resul;
	}

  //////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////*PERIODICO*////////////////////////////////////////
  public function Ver_Periodicos(){
    $EE_modelo = $this->model('periodicoModel');
	$periodicos = $EE_modelo->select_all_periodicos();
	$this->view('periodico/mostrar_periodicos', ['periodicos'=>$periodicos]);
  }

  public function Agregar_Periodico(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo = $this->model('periodicoModel');
    $EE_modelo->registra_periodico($_POST["NombrePeriodico"],$_POST["CallePeriodico"],$_POST["NumeroPeriodico"],$_POST["ColoniaPeriodico"],$_POST["MunicipioPeriodico"],$_POST["EstadoPeriodico"],$_POST["PaisPeriodico"],$_POST["Tiraje"]);
     $this->view('periodico/insertar_periodico');
  }

  ///////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////*PARTIDO*///////////////////////////////////////
  public function Ver_Partidos(){
    $EE_modelo = $this->model('partidoModel');
	$partidos = $EE_modelo->select_all_partidos();
	$this->view('partido/mostrar_partidos', ['partidos'=>$partidos]);
  }

  public function Agregar_partidos(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo = $this->model('partidoModel');
    $EE_modelo->registra_periodico($_POST["NombrePartido"],$_POST["CallePartido"],$_POST["NumeroPartido"],$_POST["ColoniaPartido"],$_POST["MunicipioPartido"],$_POST["EstadoPartido"],$_POST["PaisPartido"]);
     $this->view('partido/insertar_partido');
  }

  //////////////////////////////////////////////////////////////////////////////////////7


  function inicio(){
    header("Location: ". "/ProyectoCorrupcion/sistema/public/");
  }
}

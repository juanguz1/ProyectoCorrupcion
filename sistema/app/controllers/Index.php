<?php
class Index extends Controller
{
  private $response;
  private $modelo_juez;
  private $modelo_ciudadano;
  private $modelo_periodico;

  function __construct(){
    $this->modelo_juez = $this->model('juezModel');
    $this->modelo_ciudadano = $this->model('ciudadanoModel');
    $this->modelo_periodico = $this->model('periodicoModel');
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
    $ciudadanos = $this->modelo_ciudadano->select_datos_ciudadanos();
    $this->view('ciudadano/gestionar_ciudadano', ['ciudadanos'=>$ciudadanos]);
  }


  public function Agregar_Ciudadano(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo = $this->model('ciudadanoModel');
    $EE_modelo->registra_ciudadano($_POST["idCiudadano"],$_POST["Nombre"],$_POST["ApellidoPaterno"],$_POST["ApellidoMaterno"],$_POST["FechaNacimiento"],$_POST["Calle"],$_POST["Numero"],$_POST["Colonia"],$_POST["Municipio"],$_POST["Estado"],$_POST["Pais"],$_POST["Patrimonio"]);
     $this->view('ciudadano/insertar_ciudadano');
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
    $periodicos = $this->modelo_periodico->select_all_periodicos();
    $this->view('periodico/gestionar_periodico', ['periodicos'=>$periodicos]);
  }

  public function Agregar_Periodico(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo = $this->model('periodicoModel');
    $EE_modelo->registra_periodico($_POST["NombrePeriodico"],$_POST["CallePeriodico"],$_POST["NumeroPeriodico"],$_POST["ColoniaPeriodico"],$_POST["MunicipioPeriodico"],$_POST["EstadoPeriodico"],$_POST["PaisPeriodico"],$_POST["Tiraje"]);
     $this->view('periodico/insertar_periodico');
  }

  public function actualizar_Periodico($NombrePeriodico){
        $consulta_actualiza = $this->modelo_periodico->consulta_actualizar($NombrePeriodico);
        $periodico = $consulta_actualiza->fetch_object();
        die(json_encode(array('NombrePeriodico'=>$periodico->NombrePeriodico,'Tiraje'=>$periodico->Tiraje,'CallePeriodico'=>$periodico->CallePeriodico,'NumeroPeriodico'=>$periodico->NumeroPeriodico,'ColoniaPeriodico'=>$periodico->ColoniaPeriodico,'MunicipioPeriodico'=>$periodico->MunicipioPeriodico,'EstadoPeriodico'=>$periodico->EstadoPeriodico,'PaisPeriodico'=>$periodico->PaisPeriodico)));
  }
  
  public function actualizaPeriodico(){
    $resul = $this->modelo_periodico->update_periodico($_POST["NombrePeriodico1"],$_POST["Tiraje"],$_POST["CallePeriodico"],$_POST["NumeroPeriodico"],$_POST["ColoniaPeriodico"],$_POST["MunicipioPeriodico"], $_POST["EstadoPeriodico"],$_POST["PaisPeriodico"]);
    echo $resul;  
    return $resul;
  }
  
  public function borraPeriodico($NombrePeriodico){
    $resul = $this->modelo_periodico->delete_periodico($NombrePeriodico);
    return $resul;
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

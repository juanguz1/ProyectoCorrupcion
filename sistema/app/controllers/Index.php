<?php
class Index extends Controller
{
  private $response;
  private $modelo_juez;
  private $modelo_ciudadano;
  private $modelo_periodico;

  function __construct(){
    $this->modelo_juez = $this->model('juezModel');
    $this->modelo_caso = $this->model('casoModel');
    $this->modelo_ciudadano = $this->model('ciudadanoModel');
    $this->modelo_periodico = $this->model('periodicoModel');
    $this->modelo_partido =  $this->model('partidoModel');
  }

  function caso(){
	   $this->view('caso/insertar_caso');
  }

  function imputado(){
     $ciudadanos = $this->modelo_ciudadano->consulta_ciudadano();
     $casos=$this->modelo_caso->consulta_casos();
     $this->view('caso/insertar_caso_ciudadano',['ciudadanos'=>$ciudadanos,"casos"=>$casos]);

  }

  function ciudadano(){
	   $this->view('ciudadano/insertar_ciudadano');
  }

  function juez(){
     $consul_ciu = $this->modelo_juez->consulta_ciudadano();
     $this->view('juez/insertar_juez',['ciudadanos'=>$consul_ciu]);
  }

  function periodico(){
	  $this->view('periodico/insertar_periodico');
  }

  function partido(){
	  $this->view('partido/insertar_partido');
  }

  ///////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////*CASOS*/////////////////////////////////////////////////
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

  public function Agregar_inputado(){
    $postdata=file_get_contents("php://input");
    $request=json_decode($postdata);
    $EE_modelo=$this->model('casoModel');
    $EE_modelo->registra_implicado($_POST["idCiudadano"],$_POST["idCaso"],$_POST["Cargo"]);
      $this->view('caso/insertar_caso');
  }

  public function Ver_Casos(){
    $casos = $this->modelo_caso->select_all_casos();
    $this->view('caso/gestionar_caso', ['casos'=>$casos]);
  }

  public function Descripcion_caso($idCaso){
    $consulta_actualiza = $this->modelo_caso->select_descripcion_caso($idCaso);
    $caso = $consulta_actualiza->fetch_object();
    die(json_encode(array('idCaso'=>$caso->idCaso,'Descripcion'=>$caso->Descripcion)));
  }

  public function actualizar_Caso($idCaso){
        $consulta_actualiza = $this->modelo_caso->consulta_actualizar($idCaso);
        $caso = $consulta_actualiza->fetch_object();
        die(json_encode(array('idCaso'=>$caso->idCaso,'NombreCaso'=>$caso->NombreCaso,'Descripcion'=>$caso->Descripcion,'Desvio'=>$caso->Desvio,'PaisOrigen'=>$caso->PaisOrigen,'idPeriodico'=>$caso->idPeriodico,'FechaDescubrimiento'=>$caso->FechaDescubrimiento,'Dictamen'=>$caso->Dictamen)));
  }

  public function actualizaCaso(){
    $resul = $this->modelo_caso->update_caso($_POST["idCaso1"],$_POST["Nombre1"],$_POST["Descripcion1"],$_POST["Desvio"],$_POST["PaisOrigen"],$_POST["idPeriodico"], $_POST["FechaDescubrimiento"],$_POST["Dictamen"]);
    echo $resul;
    return $resul;
  }

  public function borraCaso($idCaso){
    $resul = $this->modelo_caso->delete_caso($idCaso);
    return $resul;
  }

  //////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////*CIUDADANOS*////////////////////////////////////////////
   public function Ver_Ciudadanos(){
    $ciudadanos = $this->modelo_ciudadano->select_datos_ciudadanos();
    $this->view('ciudadano/gestionar_ciudadano', ['ciudadanos'=>$ciudadanos]);
  }

  public function Antes_Ciudadano(){
    $EE_modelo=$this->model('partidoModel');
    $partidos=$EE_modelo->select_names_partido();
    $this->view('ciudadano/insertar_ciudadano', ['partidos'=>$partidos]);
  }


  public function Agregar_Ciudadano(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo = $this->model('ciudadanoModel');
    $EE_modelo->registra_ciudadano($_POST["idCiudadano"],$_POST["Nombre"],$_POST["ApellidoPaterno"],$_POST["ApellidoMaterno"],$_POST["FechaNacimiento"],$_POST["Calle"],$_POST["Numero"],$_POST["Colonia"],$_POST["Municipio"],$_POST["Estado"],$_POST["Pais"],$_POST["Patrimonio"]);
        if(isset($_POST['afiliado'])&&($_POST['afiliado']==1)){
          $EE_modelo->registra_ciudadanopartido($_POST["NombrePartido"],$_POST["idCiudadano"],$_POST["Puesto"]);

        }
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

  public function registrar_cuentaJuez(){
    $resul = $this->modelo_juez->registrar($_POST["ciudadano"],$_POST["FechaComienzo"]);
    echo $resul;
    return $resul;
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
    $this->view('partido/gestionar_partido', ['partidos'=>$partidos]);
  }


  public function Agregar_Partido(){
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $EE_modelo= $this->model('partidoModel');
    $EE_modelo->registrar_partido($_POST["NombrePartido"],$_POST["TelefonoPartido"],$_POST["CallePartido"],$_POST["NumeroPartido"],$_POST["ColoniaPartido"],$_POST["MunicipioPartido"],$_POST["EstadoPartido"],$_POST["PaisPartido"]);
    $EE_modelo->registrar_partidoperidoco($_POST["NombrePartido"],$_POST["idPeriodico"]);
    $partidos = $EE_modelo->select_all_partidos();
    $this->view('partido/gestionar_partido', ['partidos'=>$partidos]);
  }

  public function Antes_Partido(){
    $EE_modelo=$this->model('periodicoModel');
    $periodicos=$EE_modelo->select_names_periodicos();
    $this->view('partido/insertar_partido', ['periodicos'=>$periodicos]);
  }

  public function Telefonos_Partidos($NombrePartido){
  $telpartidos = $this->modelo_partido->select_telefonos($NombrePartido);
  echo $telpartidos;
  return $telpartidos;
  }

  public function actualizar_Partido($NombrePartido){
        $consulta_actualiza = $this->modelo_partido->consulta_actualizar($NombrePartido);
        $Partido = $consulta_actualiza->fetch_object();
        die(json_encode(array('NombrePartido'=>$Partido->NombrePartido,'TelefonoPartido'=>$Partido->TelefonoPartido,'CallePartido'=>$Partido->CallePartido,'NumeroPartido'=>$Partido->NumeroPartido,'ColoniaPartido'=>$Partido->ColoniaPartido,'MunicipioPartido'=>$Partido->MunicipioPartido,'EstadoPartido'=>$Partido->EstadoPartido,'PaisPartido'=>$Partido->PaisPartido)));
  }

  public function actualizaPartido(){
    $resul = $this->modelo_partido->update_partido($_POST["NombrePartido1"], $_POST["TelefonoPartido"], $_POST["Calle1"],$_POST["Numero1"],$_POST["Colonia1"],$_POST["Municipio1"], $_POST["Estado1"],$_POST["Pais1"]);
    echo $resul;
    return $resul;
  }

  public function borraPartido($NombrePartido){
    $resul = $this->modelo_partido->delete_partido($NombrePartido);
    return $resul;
  }

  //////////////////////////////////////////////////////////////////////////////////////7


  function inicio(){
    header("Location: ". "/ProyectoCorrupcion/sistema/public/");
  }
}

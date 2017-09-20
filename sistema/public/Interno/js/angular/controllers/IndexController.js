app. 
controller('indexController', function($scope,indexFactory,$window){
  $scope.errorBoleta;
  $scope.mensaje = "Si utilizas por primera vez el sistema da click aquí";
  //var letras =  new RegExp("[a-zA-Z]");
  var numeros =  new RegExp("[1-9]");
  $scope.url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  $scope.iniciarSesion = function(){
    if(!numeros.test($scope.boleta)){
      $scope.errorBoleta = "Introduce únicamente números.";
    }else{
      $scope.errorBoleta = '';
      indexFactory.login({'boleta':$scope.boleta,'password':$scope.pass}, function(resultado,error){      
      if(resultado.boleta){
        console.log(resultado);
        alertify.alert('', ` <img src='/Proyecto_IS/ProyectoSemestreIS/sistema/public/interno/images/check.png' style='position:absolute; top:35%; left:50 %;'>
      <div style='position:absolute; top:50%; left:30%; color:gray; font-size:20px;'> Inicio de sesión exitoso.`); 
        sleep(1700).then(() => {
             $window.location.href = $scope.url_path+'Estudiante_Egresado/Solicitar_Tramite';
        });
      }else{
        alertify.alert('', ` <img src='/Proyecto_IS/ProyectoSemestreIS/sistema/public/interno/images/alert.png' style='position:absolute; top:35%; left:5 %;'>
      <div style='position:absolute; top:35%; left:30%; color:gray;'> ¡La boleta y/o contraseña es INCORRECTA! <br>Inténtalo  nuevamente o verifica tus datos en Gestión Escolar`);
      }
    });
    }
  };
  $scope.primerMensaje = function(){
    $scope.mensaje = "Ingresa en el campo de contraseña tu CURP. Podrás modificarlo posteriormente si lo deseas.";
  };
}).controller('indexControllerTrabajador',function($scope,indexFactory,$window){
  $scope.url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  $scope.url_term;
  $scope.errorBoleta;
  var numeros =  new RegExp("[1-9]");
  $scope.mensaje = "Si utiliza por primera vez el sistema de click aquí";
  $scope.iniciarSesion = function(){
    if(!numeros.test($scope.noEmpleado)){
      $scope.errorBoleta = "Introduzca únicamente números.";
    }else{
        $scope.errorBoleta='';
        indexFactory.loginTrabajador({'noEmpleado': $scope.noEmpleado, 'password':$scope.password}, function(resultado){
        console.log(resultado);
        if(resultado.noEmpleado){
          console.log(resultado);
          alertify.alert('', ` <img src='/Proyecto_IS/ProyectoSemestreIS/sistema/public/interno/images/check.png' style='position:absolute; top:35%; left:50 %;'>
      <div style='position:absolute; top:50%; left:30%; color:gray; font-size:20px;'> Inicio de sesión exitoso.`); 
          if(resultado.area == "A01"){
            $scope.url_term = "Departamento_Escolar/Index";
          }else if(resultado.area == "A02"){
            $scope.url_term = "Analista_Solicitudes/Visualizar_Tramite";
          }else if(resultado.area == "A03"){
            $scope.url_term = "Jefa_Gestion/gestionar_cuentas";
          }else if(resultado.area == "A04"){
            $scope.url_term = "Autoridad_pertinente/grafica_analista";
          }
          sleep(1700).then(() => {
                $window.location.href = $scope.url_path+$scope.url_term;
          });
        }else{
          alertify.alert('', ` <img src='/Proyecto_IS/ProyectoSemestreIS/sistema/public/interno/images/alert.png' style='position:absolute; top:35%; left:5 %;'>
        <div style='position:absolute; top:50%; left:30%; color:gray;'> No. de empleado y/o contraseña incorrecta.`);
        }
      });
    }
  };
  $scope.primerMensaje = function(){
    $scope.mensaje = "Ingrese en el campo de contreseña su RFC. Podrá modificarlo posteriormente si lo desea.";
  };
  
});


function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
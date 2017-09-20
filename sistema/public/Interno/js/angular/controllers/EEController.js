app. 
controller('solicitarTramiteController',  function($scope, estudianteFactory){
  $scope.data = {
    documento:0,
    motivo:0
  };
  $scope.url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  var documento_nombre = ["Boleta global","Boleta certificada","Boleta departamental","Constancia de inscripción","Constancia de estudios","Constancia con periodo vacacional","Constancia para trámite de SS","Constancia de prácticas profesionales","Constancia de inscripción y horario"];
  $scope.tipo;
  $scope.email;
  estudianteFactory.get_tipo(function(response){
    $scope.tipo = response.tipo;
    $scope.email = response.email;
    console.log($scope.email);
  });
  $scope.contador = 0;
  $scope.documentos =[]; 
  $scope.documentos_aux = [];
  $scope.motivoTex;
  $scope.agregar_peticion = function(){
    if($scope.data.motivo != 1){
      if($scope.data.motivo == 2)
        $scope.motivoTex = 'Actividad Cultural';
      else if($scope.data.motivo == 3)
        $scope.motivoTex = 'Actividad Deportiva';
      else if($scope.data.motivo == 4)
        $scope.motivoTex = 'Beca';
      if($scope.contador < 5){
        if($scope.tipo != 1 && $scope.data.documento > 0){
          $scope.documentos_aux.push({'nombre': documento_nombre[$scope.data.documento-1],'idDocumento':$scope.data.documento,'idMotivo':$scope.data.motivo,'motivo':$scope.motivoTex});
        }else if($scope.tipo == 1 && $scope.data.documento > 1){
          alertify.alert('', ` <img src='/Proyecto_IS/ProyectoSemestreIS/sistema/public/interno/images/alert.png' style='position:absolute; top:35%; left:5 %;'>
        <div style='position:absolute; top:50%; left:30%; color:gray;'> Sólo puedes solicitar boleta global.`);
        }else if($scope.tipo == 1 && $scope.data.documento == 1){
            $scope.documentos_aux.push({'nombre': documento_nombre[$scope.data.documento-1],'idDocumento':$scope.data.documento,'idMotivo':$scope.data.motivo,'motivo':$scope.motivoTex});
        }
        $scope.contador++;
        $scope.documentos = $scope.documentos_aux;
        console.log($scope.documentos);
      }else{
        alertify.alert('', ` <img src='/Proyecto_IS/ProyectoSemestreIS/sistema/public/interno/images/alert.png' style='position:absolute; top:35%; left:5 %;'>
        <div style='position:absolute; top:50%; left:30%; color:gray;'> El número máximo de peticiones al mes es 5.`);
      }
    }else{
      alertify.error('Debes introducir un motivo válido para tu petición.');
    }
    
  };
  $scope.eliminarPeticion = function(id){
    $scope.documentos_aux.splice(id,1);
    $scope.documentos = $scope.documentos_aux;
    $scope.contador--;
    alertify.error('Has eliminado un documento de tu lista.')
  };
  $scope.enviarPeticiones = function(){
    if($scope.documentos.length != 0){
      alertify.prompt('¿Estás seguro?', `Tu solicitud se enviará a control escolar y te enviaremos un correo cuando haya sido aceptada y cuando esté lista para recogerse. <br> ¿Es correcto tu correo? Actualiza en caso de que no sea correcto.`, $scope.email
      ,function(evt, value) {
          estudianteFactory.update_email({email:value}, function(){
        });
        alertify.success("Se ha enviado tu solicitud, puedes verificar en qué estapa se encuentra en el apartado de 'Mis solicitudes en proceso.'");
        estudianteFactory.post_solicitudes($scope.documentos,function(resultado){
          sleep(2000).then(()=>{
            $window.location.href = $scope.url_path+'Estudiante_Egresado/Solicitar_Tramite';
          });
        });
      },function() { alertify.error('No se ha enviado tu solicitud, puedes seguir agregando o quitando documentos.') }).set('labels', {ok:'Enviar', cancel:'Cancelar'});
    }else{
      alertify.error('Debes tener al menos un documento en tu petición.');
    }
  };
  
});
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

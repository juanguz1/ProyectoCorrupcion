app. 
controller('AnalistaController',  function($scope, analistaFactory){
  $scope.idSolicitud;
  $scope.Boleta;
  
  $scope.aceptarSolicitud = function (){
	  alertify.prompt('Solicitud de folio', 'Ingresa el folio','',
	     function(evt, value) {
				 alert($scope.idSolicitud);
				 alert($scope.Boleta);
		analistaFactory.post_solicitudes({'idSolicitud':$scope.idSolicitud,'Boleta':$scope.Boleta},function(){

		});
		alertify.success('Se ha aceptado el trámite del documento');
	     }, function(){
		alertify.error('No se realizo ningun cambio');
	   });
    };
}).controller('solicitarTramiteController', function ($scope,analistaFactory){
	$scope.data = {
		documento:0,
		motivo:0
	};
	$scope.boleta;
	$scope.tipo;
	alertify.prompt('Introduce la boleta del alumno/egresado','','boleta'
		,function(evt, value) {
			$scope.boleta = value;
			analistaFactory.get_boleta({boleta:value}, function(result){
				$scope.tipo = result.tipo;
				if($scope.tipo == 0)
					alertify.success("El alumno está registrado y puede solicitar todos los documentos disponibles.");
				else if($scope.tipo == 1)
					alertify.success("El alumno ya está egresado, sólo puede solicitar boleta globa.");
				else if($scope.tipo == undefined)
					alertify.error("No se ha encontrado el alumno.");
			});
			/*estudianteFactory.post_solicitudes($scope.documentos,function(resultado){
			 $scope.documentos = [];
			 });*/
		},function() { alertify.error('Para que el proceso se lleve a cabo correctamente una boleta debe ser introducida.') }).set('labels', {ok:'Enviar', cancel:'Cancelar'});;

	var documento_nombre = ["Boleta global","Boleta certificada","Boleta departamental","Constancia de inscripción","Constancia de estudios","Constancia con periodo vacacional","Constancia para trámite de SS","Constancia de prácticas profesionales","Constancia de inscripción y horario"];
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
			alertify.prompt('¿Estás seguro?', `Tu solicitud se enviará a control escolar y te enviaremos un correo cuando haya sido aceptada y cuando esté lista para recogerse. <br> ¿Es correcto tu correo? Actualiza en caso de que no sea correcto.`, 'cuerpoCorreo@servidor.dominio'
				,function(evt, value) {
					analistaFactory.update_email({email:value, boleta:$scope.boleta}, function(){

					});
					alertify.success("Se ha mandado la solicitud, el alumno/egresado puede verificar en qué estapa se encuentra en el apartado de 'Mis solicitudes en proceso.' dentro de su perfil.");
					analistaFactory.post_solicitudes_documentos({documentos:$scope.documentos,boleta:$scope.boleta},function(resultado){
						$scope.documentos = [];
					});
				},function() { alertify.error('No se ha enviado la solicitud, puede seguir agregando o quitando documentos.') }).set('labels', {ok:'Enviar', cancel:'Cancelar'});;

		}else{
			alertify.error('Debe haber al menos un documento en la solicitud.');
		}
	};

});

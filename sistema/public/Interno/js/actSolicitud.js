	var idsolicitud;
	var boleta;
	var motivo;
	var aceptacion;
	var pag;
	
	function actualizarAceptacion(){
		var folio= $('input[id=inputFolio]').val();
		$.ajax({
			method:"post",
			url:"/Proyecto_IS/proyectoSemestreIS/sistema/public/Analista_Solicitudes/Peticion_Acep",
			data: { idSolicitud: idSolicitud, Boleta: boleta, Folio: folio, aceptacion: aceptacion, motivo: motivo,pag:pag, vars: folio},
			beforeSend:function(){
					$("#Modal_aceptar").modal('hide');
					$("#myModal").modal('show');
			},
			success:function(data){
				
				if (data=='Solicitud Aceptada1'){
					alertify.success('Operación realizada con éxito');
					setTimeout("location.href= '/Proyecto_IS/proyectoSemestreIS/sistema/public/Analista_Solicitudes/Visualizar_Tramite'",1000);
				}
				else if (data=='Solicitud Aceptada2'){
					alertify.success('Operación realizada con éxito');
					setTimeout("location.href= '/Proyecto_IS/proyectoSemestreIS/sistema/public/Analista_Solicitudes/Tramites_Aceptados'",1000);
				}
				else if (data=='Solicitud Aceptada3'){
					alertify.success('Operación realizada con éxito');
					setTimeout("location.href= '/Proyecto_IS/proyectoSemestreIS/sistema/public/Analista_Solicitudes/Tramites_Rechazados'",1000);
				}
				else
					alertify.error('No se realizó ningún cambio, intente más tarde.');
				$("#myModal").modal('hide');
				
			}
		});
		return false;
	}
	
	
	function aceptarSolicitud (idsol, bol, p){
		idSolicitud=idsol;
		boleta = bol;
		pag=p;
		aceptacion=1;
		motivo='null';
		$("#Modal_aceptar").modal();
	}
	
	function cancelarSolicitud(idsol, bol, p){
		pag=p;
		idSolicitud=idsol;
		boleta=bol;
		aceptacion=2;
		folio='null';
		$('#Modal_rechazar').modal();
	}
	
	$(function () {
		$('#datetimepicker2').datetimepicker({
			locale: 'es'
		});
	});
	
	$(document).ready(function(){
		$("#acepAceptar").click(function(e){
			var folio= $('input[id=inputFolio]').val();
			if (folio.length<1){
				alertify.error('Debe ingresar el folio del documento');
			}
			else 
				actualizarAceptacion();
		});
		
		$("#ReAcep").click(function(e){
			motivo = $('select[id=Rechazo]').val();
			if (motivo==0){
				alertify.error('Debe de seleccionar algún mótivo por el cuál no acepta la solicitud');
			}
			else
				actualizarAceptacion();
		});
	});

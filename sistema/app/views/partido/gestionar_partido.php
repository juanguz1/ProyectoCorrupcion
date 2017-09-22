<?php 
	include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");
?>
<?php startblock('title') ?>
    Gestionar partidos
<?php endblock() ?>

<?php startblock('main') ?>
    <p> Consulte, actualice o elimine partidos.</p>

    <div id="SolicitudesPen">
	<section id="SolicitudesPen">
		<div class="row">
			<div class="col-log-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive table-border">
							<table class="table table-hover" style="text-align:center;">
								<thead  style="background: #288CCC">
									<tr style='color:white;'>
										<th style='text-align:center'>Nombre del partido</th>
										<th style='text-align:center'>Télefonos</th>
										<th style='text-align:center'>Calle</th>
										<th style='text-align:center'>Numero</th>
										<th style='text-align:center'>Colonia</th>
										<th style='text-align:center'>Municipio</th>
										<th style='text-align:center'>Estado</th>
										<th style='text-align:center'>Pais</th>
										<th style="text-align:center">Acción</th>
									</tr>
									<?php 
										if($data['partidos']){
											while($partidos = $data['partidos']->fetch_assoc()){
												
													print "<tr style='background: white;'id='{$partidos['NombrePartido']}'>"; //fila normal
		
														print "<th> {$partidos['NombrePartido']}</th>";
														print "<th> {$partidos['TelefonoPartido']}</th>";
														print "<th> {$partidos['CallePartido']}</th>";
														print "<th> {$partidos['NumeroPartido']}</th>";
														print "<th> {$partidos['ColoniaPartido']}</th>";
														print "<th> {$partidos['MunicipioPartido']}</th>";
														print "<th> {$partidos['EstadoPartido']}</th>";
														print "<th> {$partidos['PaisPartido']}</th>";
														print "<td style='text-align: center;'>";
															print "<button type='button' class='btn btn-outline btn-info Update' style='margin:auto;' data-toggle='modal' data-target='#ActualizarModal' data-nombrepartido={$partidos['NombrePartido']} id='{$partidos['NombrePartido']}b'><i class='fa fa-refresh'></i></button>"; 
															print "<button type='button' class='btn btn-outline btn-danger Delete' style='margin:auto;' data-nombrepartido={$partidos['NombrePartido']} id='{$partidos['NombrePartido']}b'><i class='fa fa-times'></i></button>";
														print "</td>";    
													print "</tr>";
											}
										}
										else{
											print "No existen cuentas registradas";
										}
									?>
								</thead>
							</table>
						</div>
					</div>
				</div>
            </div>
			
			<!-- ACTUALIZAR CUENTA -->
			<div id="ActualizarModal" class="modal fade" role="dialog">
				<div class="modal-dialog" style="width:650px;">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title" style="">Actualizar partido</h2>
							<h5>Actualice los datos incorrectos</h5>
						</div>
						<div class="modal-body">
							<div class="col-md-12">
								<h6>Datos marcados con <span style="color:red;">*</span> son forzosos.</h6>
							</div>
							<form class="form-horizontal" id="actualizarForm" ng-controller="validateCtrl">
								<div class="form-group" >
									<label for="inputEmail3" class="col-sm-3 control-label">Nombre del partido </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="NombrePartido1" name="NombrePartido" disabled>
										<input type="hidden" name="NombrePartido1" id="hiddenNomPar1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Teléfono</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="TelefonoPartido" name="TelefonoPartido">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Calle <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Calle1" name="Calle1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Número <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Numero1" name="Numero1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Colonia <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Colonia1" name="Colonia1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Municipio <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Municipio1" name="Municipio1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Estado<span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Estado1" name="Estado1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">País <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Pais1" name="Pais1">
										<br>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-default" id="actualizacion">Actualizar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	<script src="<?= $url_path?>Interno/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function () {
		$('.Update').on('click',function(){
			console.log(String($(this).data('nombrepartido')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizar_Partido/"+$(this).data('nombrepartido');
			$.ajax({
			type: "GET",
			url: url,
			success: function(data){
				console.log(data);
				partido = JSON.parse(data);
				$('#NombrePartido1').val(partido.NombrePartido);
				$('#hiddenNomPar1').val(partido.NombrePartido);
				$('#TelefonoPartido').val(partido.TelefonoPartido);
				$('#Calle1').val(partido.CallePartido);
				$('#Numero1').val(partido.NumeroPartido);
				$('#Colonia1').val(partido.ColoniaPartido);
				$('#Municipio1').val(partido.MunicipioPartido);
				$('#Estado1').val(partido.EstadoPartido);
				$('#Pais1').val(partido.PaisPartido);
			}
			});
		});	
		$('#actualizarForm').submit(function(e){
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizaPartido";
			$.ajax({
			type:"POST",
			url: url,
			data: $("#actualizarForm").serialize(), 
			success: function(data){
				if (data=='Actualizado'){
					alertify.success("Se ha actualizado el partido exitosamente");
				}else {
					alertify.error('No se realizó ningún cambio, intente más tarde.');
					
				}
				sleep(1700).then(()=>{
					location.reload();
				});
			}
			});
		});
		$('.Delete').on('click',function(){
			console.log(String($(this).data('nombrepartido')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/borraPartido/"+$(this).data('nombrepartido');
			var mensaje = confirm("¿Estas seguro que deseas elimnar el partido?");
			if (mensaje) {
				$.ajax({
				type:"GET",
				url: url, 
				success: function(data){
					if (data=='Borrado'){
						alertify.success("Se ha eliminado el partido exitosamente");
					}else {
						alertify.error('No se realizó ningún cambio, intente más tarde.');
					}
					sleep(1700).then(()=>{
						location.reload();
					});
				}
				});
			}
		});
	function sleep (time) {
		return new Promise((resolve) => setTimeout(resolve, time));
	}

});




</script>
<?php endblock() ?>


<?php startblock('scripts') ?>
<script>
	app.controller('validateCtrl', function($scope) {
		var numeros =  new RegExp("[1-9]");
		var letras =  /^[a-zA-Z]*$/;
		var correo = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var RFC = /^([A-Z,Ñ,&]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/;
		$scope.validnombrepartido = function(){
			if(!numeros.test($scope.idCiudadano)){
				$scope.checkNoEmpleado = true;
			}else{
				$scope.checkNoEmpleado = false;
			}
		};		
		$scope.valida_nombre = function(){
			console.log($scope.nombre);
			console.log(letras.test($scope.nombre));
			if(!letras.test($scope.nombre)){
				$scope.checkNombre = true;
			}else{
				$scope.checkNombre = false;
			}
		};
		$scope.valida_apPat = function(){
			if(!letras.test($scope.apPaterno)){
				$scope.checkApPaterno = true;
			}else{
				$scope.checkApPaterno = false;
			}
		};
		$scope.valida_apMat = function(){
			if(!letras.test($scope.apMaterno)){
				$scope.checkApMaterno = true;
			}else{
				$scope.checkApMaterno = false;
			}
		};
		$scope.valida_RFC = function(){
			if(!RFC.test($scope.rfc)){
				$scope.checkRFC = true;
			}else{
				$scope.checkRFC = false;
			}
		};
		$scope.valida_email = function(){
			if(!correo.test($scope.email)){
				$scope.checkCorreo = true;
			}else{
				$scope.checkCorreo = false;
			}
		};
	});	
</script>

<?php endblock() ?>
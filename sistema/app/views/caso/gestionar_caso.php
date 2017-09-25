<?php 
	include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");
?>
<?php startblock('title') ?>
    Gestionar casos
<?php endblock() ?>
<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<?php startblock('main') ?>
    <p> Consulte, actualice o elimine casos.</p>

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
										<th style='text-align:center'>Número de caso</th>
										<th style='text-align:center'>Nombre del caso</th>
										<th style='text-align:center'>Descripción</th>
										<th style='text-align:center'>Desvío</th>
										<th style='text-align:center'>País de origen</th>
										<th style='text-align:center'>Periódico</th>
										<th style='text-align:center' width='10%'>Fecha Descubrimiento</th>
										<th style='text-align:center'>Dictamen</th>
										<th style="text-align:center">Acción</th>
									</tr>
									<?php 
										if($data['casos']){
											while($casos = $data['casos']->fetch_assoc()){
												
													print "<tr style='background: white;'id='{$casos['idCaso']}'>"; //fila normal
														print "<th> {$casos['idCaso']}</th>";
														print "<th> {$casos['NombreCaso']}</th>";
														print "<th>";
															print "<button type='button' class='btn btn-outline btn-info VerDescripcion' style='margin:auto;' data-toggle='modal' data-target='#verDescripcion' data-idcaso={$casos['idCaso']} id='{$casos['idCaso']}b'>Ver más</button>"; 
														print "</th>";
														print "<th> {$casos['Desvio']}</th>";
														print "<th> {$casos['PaisOrigen']}</th>";
														print "<th> {$casos['idPeriodico']}</th>";
														print "<th> {$casos['FechaDescubrimiento']}</th>";
														print "<th> {$casos['Dictamen']}</th>";
														print "<td style='text-align: center;'>";
															print "<button type='button' class='btn btn-outline btn-info Update' style='margin:auto;' data-toggle='modal' data-target='#ActualizarModal' data-idcaso={$casos['idCaso']} id='{$casos['idCaso']}b'><i class='fa fa-refresh'></i></button>"; 
															print "<button type='button' class='btn btn-outline btn-danger Delete' style='margin:auto;' data-idcaso={$casos['idCaso']} id='{$casos['idCaso']}b'><i class='fa fa-times'></i></button>";
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
			
			<!--VER DIRECCIÓN-->
			<div id="verDescripcion" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width:650px;">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="modal-title" style="">Descripción del caso</h2>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="direccion"  name="direccion">
							<div class="form-group" >
								<label for="inputEmail3" class="col-sm-3 control-label">idCaso</label>
								<div class="col-sm-8">
									<input type="text" class="form-control"  id="idCaso" name="idCaso" disabled>
									<input type="hidden" name="idCaso" id="hiddenCaso">
									<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Descripción</label>
								<div class="col-sm-8">
									<textarea rows="3" cols="54" id="Descripcion" name="Descripcion" disabled></textarea>
									<input type="hidden" name="idCaso" id="hiddenDescripcion">
									<br>
								</div>
							</div>					
						</div>
						<!--<div class="modal-footer">
							<button type="submit" class="btn btn-default" id="direccionAcep">Aceptar</button>
						</div>-->
					</form>
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
							<h2 class="modal-title" style="">Actualizar caso</h2>
							<h5>Actualice los datos incorrectos</h5>
						</div>
						<div class="modal-body">
							<div class="col-md-12">
								<h6>Datos marcados con <span style="color:red;">*</span> son forzosos.</h6>
							</div>
							<form class="form-horizontal" id="actualizarForm" ng-controller="validateCtrl">
								<div class="form-group" >
									<label for="inputEmail3" class="col-sm-3 control-label">Número de caso </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="idCaso1" name="idCaso" disabled>
										<input type="hidden" name="idCaso1" id="hiddenCaso1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nombre del caso<span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Nombre1" name="Nombre1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Descripción <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<textarea rows="3" cols="54" id="Descripcion1" name="Descripcion1" required></textarea>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Desvío</label>
									<div class="col-sm-8">
										<input type="number" min="1" class="form-control" id="Desvio" name="Desvio" ng-keypress="valida_apMat()" ng-model="apMaterno" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">País de origen<span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="PaisOrigen" name="PaisOrigen" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">idPeriodico <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="idPeriodico" name="idPeriodico" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">FechaDescubrimiento <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="FechaDescubrimiento" name="FechaDescubrimiento" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Dictamen <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Dictamen" name="Dictamen" required>
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
		$('.VerDescripcion').on('click',function(){
			console.log(String($(this).data('idcaso')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/Descripcion_caso/"+$(this).data('idcaso');
			$.ajax({
			type: "GET",
			url: url,
			success: function(data){
				console.log(data);
				caso = JSON.parse(data);
				$('#idCaso').val(caso.idCaso);
				$('#hiddenCaso').val(caso.idCaso);
				$('#Descripcion').val(caso.Descripcion);
				$('#hiddenDescripcion').val(caso.Descripcion);
			}
			});
		});	
		
		$('.Update').on('click',function(){
			console.log(String($(this).data('idcaso')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizar_Caso/"+$(this).data('idcaso');
			$.ajax({
			type: "GET",
			url: url,
			success: function(data){
				console.log(data);
				caso = JSON.parse(data);
				$('#idCaso1').val(caso.idCaso);
				$('#hiddenCaso1').val(caso.idCaso);
				$('#Nombre1').val(caso.NombreCaso);
				$('#Descripcion1').val(caso.Descripcion);
				$('#Desvio').val(caso.Desvio);
				$('#PaisOrigen').val(caso.PaisOrigen);
				$('#idPeriodico').val(caso.idPeriodico);
				$('#FechaDescubrimiento').val(caso.FechaDescubrimiento);
				$('#Dictamen').val(caso.Dictamen);
			}
			});
		});	
		$('#actualizarForm').submit(function(e){
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizaCaso";
			$.ajax({
			type:"POST",
			url: url,
			data: $("#actualizarForm").serialize(), 
			success: function(data){
				if (data=='Actualizado'){
					alertify.success("Se ha actualizado el caso exitosamente");
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
			console.log(String($(this).data('idcaso')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/borraCaso/"+$(this).data('idcaso');
			var mensaje = confirm("¿Estas seguro que deseas elimnar el caso?");
			//Detectamos si el usuario acepto el mensaje
			if (mensaje) {
				$.ajax({
				type:"GET",
				url: url, 
				success: function(data){
					if (data=='Borrado'){
						alertify.success("Se ha eliminado el caso exitosamente");
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
		$scope.valididCiudadano = function(){
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
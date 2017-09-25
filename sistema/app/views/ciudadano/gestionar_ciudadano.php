<?php 
	include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");
?>
<?php startblock('title') ?>
    Gestionar ciudadanos
<?php endblock() ?>
<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<?php startblock('main') ?>
    <p> Consulte, actualice o elimine ciudadanos.</p>

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
										<th style='text-align:center'>DNI</th>
										<th style='text-align:center'>Nombre (s)</th>
										<th style='text-align:center'>Apellido Paterno</th>
										<th style='text-align:center'>Apellido Materno</th>
										<th style='text-align:center' width='10%'>Fecha Nacimiento</th>
										<th style='text-align:center'>Patrimonio</th>
										<th style='text-align:center'>Dirección</th>
										<th style="text-align:center">Acción</th>
									</tr>
									<?php 
										if($data['ciudadanos']){
											while($ciudadanos = $data['ciudadanos']->fetch_assoc()){
												
													print "<tr style='background: white;'id='{$ciudadanos['idCiudadano']}'>"; //fila normal
		
														print "<th> {$ciudadanos['idCiudadano']}</th>";
														print "<th> {$ciudadanos['Nombre']}</th>";
														print "<th> {$ciudadanos['ApellidoPaterno']}</th>";
														print "<th> {$ciudadanos['ApellidoMaterno']}</th>";
														print "<th> {$ciudadanos['FechaNacimiento']}</th>";
														print "<th> {$ciudadanos['Patrimonio']}</th>";
														print "<th>";
															print "<button type='button' class='btn btn-outline btn-info VerDireccion' style='margin:auto;' data-toggle='modal' data-target='#verDireccion' data-idciudadano={$ciudadanos['idCiudadano']} id='{$ciudadanos['idCiudadano']}b'>Ver más</button>"; 
														print "</th>";
														print "<td style='text-align: center;'>";
															print "<button type='button' class='btn btn-outline btn-info Update' style='margin:auto;' data-toggle='modal' data-target='#ActualizarModal' data-idciudadano={$ciudadanos['idCiudadano']} id='{$ciudadanos['idCiudadano']}b'><i class='fa fa-refresh'></i></button>"; 
															print "<button type='button' class='btn btn-outline btn-danger Delete' style='margin:auto;' data-idciudadano={$ciudadanos['idCiudadano']} id='{$ciudadanos['idCiudadano']}b'><i class='fa fa-times'></i></button>";
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
			<div id="verDireccion" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width:650px;">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="modal-title" style="">Dirección de ciudadano</h2>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="direccion"  name="direccion">
							<div class="form-group" >
								<label for="inputEmail3" class="col-sm-3 control-label">DNI</label>
								<div class="col-sm-8">
									<input type="text" class="form-control"  id="idCiudadano" name="idCiudadano" disabled>
									<input type="hidden" name="idCiudadano" id="hiddenJuez">
									<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Calle</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Calle" name="Calle" disabled>
								<input type="hidden" name="Calle" id="hiddenCalle">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Número</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Numero" name="Numero" disabled>
								<input type="hidden" name="Numero" id="hiddenNumero">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Colonia</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Colonia" name="Colonia" disabled>
								<input type="hidden" name="Colonia" id="hiddenColonia">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Municipio</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Municipio" name="Municipio" disabled>
								<input type="hidden" name="Municipio" id="hiddenMunicipio">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Estado</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Estado" name="Estado" disabled>
								<input type="hidden" name="Estado" id="hiddenEstado">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">País</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Pais" name="Pais" disabled>
								<input type="hidden" name="Pais" id="hiddenPais">
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
							<h2 class="modal-title" style="">Actualizar ciudadano</h2>
							<h5>Actualice los datos incorrectos</h5>
						</div>
						<div class="modal-body">
							<div class="col-md-12">
								<h6>Datos marcados con <span style="color:red;">*</span> son forzosos.</h6>
							</div>
							<form class="form-horizontal" id="actualizarForm" ng-controller="validateCtrl">
								<div class="form-group" >
									<label for="inputEmail3" class="col-sm-3 control-label">DNI </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="idCiudadano1" name="idCiudadano" disabled>
										<input type="hidden" name="idCiudadano1" id="hiddenCiudadano1">
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nombre</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Nombre1" name="Nombre1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Apellido Paterno</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="ApellidoPaterno1" name="ApellidoPaterno1" placeholder="Ingrese su apellido paterno" ng-keypress="valida_apPat()" ng-model="apPaterno" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Apellido Materno</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="ApellidoMaterno1" name="ApellidoMaterno1" placeholder="Ingrese su apellido materno" ng-keypress="valida_apMat()" ng-model="apMaterno" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Fecha de nacimiento <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="FechaNacimiento1" name="FechaNacimiento1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Patrimonio <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="number" class="form-control" id="Patrimonio1" name="Patrimonio1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Calle <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Calle1" name="Calle1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Número <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="number" class="form-control" id="Numero1" name="Numero1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Colonia <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Colonia1" name="Colonia1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Municipio <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Municipio1" name="Municipio1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Estado<span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Estado1" name="Estado1" required>
										<br>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">País <span style="color:red;">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="Pais1" name="Pais1" required>
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
		$('.VerDireccion').on('click',function(){
			console.log(String($(this).data('idciudadano')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/Direccion_Ciudadanos/"+$(this).data('idciudadano');
			$.ajax({
			type: "GET",
			url: url,
			success: function(data){
				console.log(data);
				direccion = JSON.parse(data);
				$('#idCiudadano').val(direccion.idCiudadano);
				$('#hiddenCiudadano').val(direccion.idCiudadano);
				$('#Calle').val(direccion.Calle);
				$('#hiddenCalle').val(direccion.Calle);
				$('#Numero').val(direccion.Numero);
				$('#hiddenNumero').val(direccion.Numero);
				$('#Colonia').val(direccion.Colonia);
				$('#hiddenColonia').val(direccion.Colonia);
				$('#Municipio').val(direccion.Municipio);
				$('#hiddenMunicipio').val(direccion.Municipio);
				$('#Estado').val(direccion.Estado);
				$('#hiddenEstado').val(direccion.Estado);
				$('#Pais').val(direccion.Pais);
				$('#hiddenPais').val(direccion.Pais);
			}
			});
		});	
		
		$('.Update').on('click',function(){
			console.log(String($(this).data('idciudadano')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizar_Ciudadano/"+$(this).data('idciudadano');
			$.ajax({
			type: "GET",
			url: url,
			success: function(data){
				console.log(data);
				ciudadano = JSON.parse(data);
				$('#idCiudadano1').val(ciudadano.idCiudadano);
				$('#hiddenCiudadano1').val(ciudadano.idCiudadano);
				$('#Nombre1').val(ciudadano.Nombre);
				$('#ApellidoPaterno1').val(ciudadano.ApellidoPaterno);
				$('#ApellidoMaterno1').val(ciudadano.ApellidoMaterno);
				$('#FechaNacimiento1').val(ciudadano.FechaNacimiento);
				$('#Patrimonio1').val(ciudadano.Patrimonio);
				$('#Calle1').val(ciudadano.Calle);
				$('#Numero1').val(ciudadano.Numero);
				$('#Colonia1').val(ciudadano.Colonia);
				$('#Municipio1').val(ciudadano.Municipio);
				$('#Estado1').val(ciudadano.Estado);
				$('#Pais1').val(ciudadano.Pais);
			}
			});
		});	
		$('#actualizarForm').submit(function(e){
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizaCiudadano";
			$.ajax({
			type:"POST",
			url: url,
			data: $("#actualizarForm").serialize(), 
			success: function(data){
				if (data=='Actualizado'){
					alertify.success("Se ha actualizado el ciudadano exitosamente");
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
			console.log(String($(this).data('idciudadano')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/borraCiudadano/"+$(this).data('idciudadano');
			var mensaje = confirm("¿Estas seguro que deseas elimnar el ciudadano?");
			//Detectamos si el usuario acepto el mensaje
			if (mensaje) {
				//alert("¡Gracias por aceptar!");
				$.ajax({
				type:"GET",
				url: url, 
				success: function(data){
					if (data=='Borrado'){
						alertify.success("Se ha eliminado el ciudadano exitosamente");
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
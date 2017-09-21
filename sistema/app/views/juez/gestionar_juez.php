<?php 
	include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");
?>
<?php startblock('title') ?>
    Gestionar jueces
<?php endblock() ?>
<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
<?php startblock('main') ?>
    <p> Consulte, actualice o elimine jueces.</p>

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
										<th style='text-align:center' width='10%'>Fecha Comienzo</th>
										<th style="text-align:center">Acción</th>
									</tr>
									<?php 
										if($data['jueces']){
											while($jueces = $data['jueces']->fetch_assoc()){
												
													print "<tr style='background: white;'id='{$jueces['idJuez']}'>"; //fila normal
		
														print "<th> {$jueces['idJuez']}</th>";
														print "<th> {$jueces['Nombre']}</th>";
														print "<th> {$jueces['ApellidoPaterno']}</th>";
														print "<th> {$jueces['ApellidoMaterno']}</th>";
														print "<th> {$jueces['FechaComienzo']}</th>";
														
														print "<td style='text-align: center;'>";
															print "<button type='button' class='btn btn-outline btn-info Update' style='margin:auto;' data-toggle='modal' data-target='#ActualizarModal' data-idjuez={$jueces['idJuez']} id='{$jueces['idJuez']}b'><i class='fa fa-refresh'></i></button>"; 
															print "<button type='button' class='btn btn-outline btn-danger Delete' style='margin:auto;' data-idjuez={$jueces['idJuez']} id='{$jueces['idJuez']}b'><i class='fa fa-times'></i></button>";
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
						<h2 class="modal-title" style="">Actualizar juez</h2>
						<h4>El unico campo que puede actualizar es la fecha de comienzo, para modificar más valla a modificar ciudadano</h4>
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
								<input type="text" class="form-control" id="idJuez" name="idJuez" disabled>
								<input type="hidden" name="idJuez" id="hiddenJuez">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="Nombre" name="Nombre" disabled>
								<input type="hidden" name="Nombre" id="hiddenNombre">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Apellido Paterno</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="ApellidoPaterno" name="ApellidoPaterno" placeholder="Ingrese su apellido paterno" ng-keypress="valida_apPat()" ng-model="apPaterno" disabled>
								<input type="hidden" name="ApellidoPaterno" id="hiddenApellidoPaterno">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Apellido Materno</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="ApellidoMaterno" name="ApellidoMaterno" placeholder="Ingrese su apellido materno" ng-keypress="valida_apMat()" ng-model="apMaterno" disabled>
								<input type="hidden" name="ApellidoMaterno" id="hiddenApellidoMaterno">
								<br>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Fecha de comienzo <span style="color:red;">*</span></label>
								<div class="col-sm-8">
								<input type="text" class="form-control" id="FechaComienzo" name="FechaComienzo">
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
			console.log(String($(this).data('idjuez')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizar_Juez/"+$(this).data('idjuez');
			$.ajax({
			type: "GET",
			url: url,
			success: function(data){
				console.log(data);
				juez = JSON.parse(data);
				$('#idJuez').val(juez.idJuez);
				$('#hiddenJuez').val(juez.idJuez);
				$('#Nombre').val(juez.Nombre);
				$('#hiddenNombre').val(juez.Nombre);
				$('#ApellidoPaterno').val(juez.ApellidoPaterno);
				$('#hiddenApellidoPaterno').val(juez.ApellidoPaterno);
				$('#ApellidoMaterno').val(juez.ApellidoMaterno);
				$('#hiddenApellidoMaterno').val(juez.ApellidoMaterno);
				$('#FechaComienzo').val(juez.FechaComienzo);
			}
			});
		});	
		$('#actualizarForm').submit(function(e){
			var url = "/ProyectoCorrupcion/sistema/public/Index/actualizaJuez";
			$.ajax({
			type:"POST",
			url: url,
			data: $("#actualizarForm").serialize(), 
			success: function(data){
				if (data=='Actualizado'){
					alertify.success("Se ha actualizado el juez exitosamente");
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
			console.log(String($(this).data('idjuez')));
			var url = "/ProyectoCorrupcion/sistema/public/Index/borraJuez/"+$(this).data('idjuez');
			var mensaje = confirm("¿Estas seguro que deseas elimnar el juez?");
			//Detectamos si el usuario acepto el mensaje
			if (mensaje) {
				//alert("¡Gracias por aceptar!");
				$.ajax({
				type:"GET",
				url: url, 
				success: function(data){
					if (data=='Borrado'){
						alertify.success("Se ha eliminado el juez exitosamente");
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
		$scope.validno_empleado = function(){
			if(!numeros.test($scope.no_empleado)){
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
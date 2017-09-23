<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>

 <?php startblock('title') ?>
     Añadir nuevo juez
  <?php endblock() ?>

 <?php startblock('main') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			Introducir los siguientes datos
        </div>
        
		<div class="panel-body">
			<div class="row">
                <div class="col-lg-8">
				<div class="modal-body">
					<div class="col-md-12">
						<h6>Datos marcados con <span style="color:red;">*</span> son forzosos.</h6>
					</div>
					<form class="form-horizontal" id="registro" ng-app="Registrar" ng-controller="validateCtrl" name="registro" novalidate>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Nombre Ciudadano <span style="color:red;">*</span></label>
								<?php
									print "<div class='col-sm-6'>";
										print "<select class='form-control' name='ciudadano'>";
										while($ciudadano = $data['ciudadanos']->fetch_assoc()){	
											print "<option value={$ciudadano['idCiudadano']}>{$ciudadano['NombreCompleto']}</option>";
										}
										print "</select>";
									print "</div>";
								?>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-5 control-label">Fecha de Comienzo <span style="color:red;">*</span></label>
								<div class="col-sm-7">
									<input type="date" name="FechaComienzo" id="FechaComienzo">
								<!--<input type="text" class="form-control" id="FechaComienzo" name="FechaComienzo" placeholder="Ingrese fecha" ng-keypress="valida_RFC()" ng-model="rfc">
								<span ng-show="checkRFC" style="color: red;"> Ingrese fecha de comienzo-->
								<br>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<!--<button type="submit" class="btn btn-default" id="nuevoRegistro" ng-disabled="registro.no_empleado.$dirty && registro.no_empleado.$invalid">Registrar</button>-->
							<button type="submit" class="btn btn-default" id="registar" onclick="verifica()" >Registrar</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>	
	
	<script src="<?= $url_path?>Interno/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		function enviaFormDatos(){
			$.ajax({
				type: "POST",
				url: "/ProyectoCorrupcion/sistema/public/Index/registrar_cuentaJuez",
				data: $("#registro").serialize(), // serializes the form's elements.
				success: function(data)
				{
					//alert(data);
					if (data=='Registrado'){
						alertify.success("Se ha registrado el juez exitosamente");
					}else {
						alertify.error('No se realizó ningún cambio, intente más tarde.');
						
					}
					sleep(1700).then(()=>{
						location.reload();
					});
				}
			});
			return false;
		}
		
		
		function verifica(){
			var fein = $('input[id=FechaComienzo]').val();
			if (fein.length <1)
				alertify.error('Falta fecha de comienzo.');
			else 
				enviaFormDatos();
		}
	
	$(document).ready(function () {
		/*$('#registro').submit(function(e){
			var url = "/ProyectoCorrupcion/sistema/public/Index/registrar_cuentaJuez";
			$.ajax({
			type: "POST",
			url: url,
			data: $("#registro").serialize(), // serializes the form's elements.
			success: function(data)
			{
				alert(data);
				if (data=='Registrado'){
					alertify.success("Se ha registrado el juez exitosamente");
				}else {
					alertify.error('No se realizó ningún cambio, intente más tarde.');
					
				}
				sleep(1700).then(()=>{
					location.reload();
				});
			}
			});
			e.preventDefault();
		});*/
		function sleep (time) {
			return new Promise((resolve) => setTimeout(resolve, time));
		}
	});
</script>
<?php endblock() ?>

<?php startblock('scripts') ?>
<!--<script src="< ?= $url_path ?>interno/js/angular/services/estudianteFactory.js"></script>
<script src="< ?= $url_path ?>interno/js/angular/controllers/EEController.js"></script>-->

<?php endblock() ?>
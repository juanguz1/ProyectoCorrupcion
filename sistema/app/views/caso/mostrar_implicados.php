<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<link rel="stylesheet" type="text/css" href="css/alertify.core.css">
<link rel="stylesheet" type="text/css" href="css/alertify.default.css">
<script type="text/javascript">
	var idCiudadano;
	var idCaso;
	
	function sleep (time) {
			return new Promise((resolve) => setTimeout(resolve, time));
		}
	
	function quitarciudadano(idCiudadano, idCaso){
		var url = "/ProyectoCorrupcion/sistema/public/Index/borraCiudadanoCaso";//+$(this).data('idcaso');
		var mensaje = confirm("¿Estas seguro que deseas elimnar el caso?");
			//Detectamos si el usuario acepto el mensaje
		if (mensaje) {
			$.ajax({
				method:"POST",
				url: url, 
				data: { idCiudadano: idCiudadano, idCaso: idCaso},
				success: function(data){
					if (data=='Borrado'){
						alertify.success("Se ha eliminado el ciudadano del caso exitosamente");
					}else {
						alertify.error('No se realizó ningún cambio, intente más tarde.');
					}
					sleep(1700).then(()=>{
						location.reload();
					});
				}
			});
		}
		return false;
	}
</script>



 <?php startblock('title') ?>
     <h1 class="section-heading">Listado de implicados</h1>
  <?php endblock() ?>

 <?php startblock('main') ?>
	<section id="implicadoslista">
		<div class="row">
			<div class="col-log-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
					<?php
						if ($data['implicados']){
							$con=0;
							while($implicados = $data['implicados']->fetch_assoc()){
								$con++;
								if ($con==1){
									  print "<table class='table'>
									  <thead  style='color:white;background: #288CCC'>
										<tr>
										  <th style='text-align:center'>Nombre Completo</th>
										  <th style='text-align:center'>País</th>
										  <th style='text-align:center'>Patrimonio</th>
										  <th style='text-align:center'>Quitar</th>
										</tr>
									  </thead>
									  <tbody>";
								}
								print "<tr>";
								print "<th> {$implicados['NombreCompleto']}</th>";
								print "<th> {$implicados['Pais']}</th>";
								print "<th> {$implicados['Patrimonio']}</th>";
								print "<td style='text-align: center;'>"; 
									print "<button class='btn btn-outline btn-danger' onClick='quitarciudadano($implicados[idCiudadano],$implicados[idCaso]);'><i class='fa fa-times'></i></button>";
								print "</td>"; 
								print "</tr>";
							  }
							print "</tbody></table>";
						}
						if($con==0){
							print "<h3 style='text-align:center; color:red'>No hay implicados almacenados</h3>";
						}
					?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <?php endblock() ?>

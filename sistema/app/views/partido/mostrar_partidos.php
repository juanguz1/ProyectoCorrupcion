<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/alertify.min.js"></script>
<script src="js/alertify.js"></script>

<link rel="stylesheet" type="text/css" href="css/alertify.core.css">
<link rel="stylesheet" type="text/css" href="css/alertify.default.css">

 

 <?php startblock('title') ?>
     <h1 class="section-heading">Listado de partidos</h1>
  <?php endblock() ?>

 <?php startblock('main') ?>
	<section id="Ciudadanoslista">
		<div class="row">
			<div class="col-log-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
					<?php 
						$con=0;	
						if ($data['partidos']){								  
							while($partidos = $data['partidos']->fetch_assoc()){
								$con++;
								if ($con==1){
									print "<table class='table'>
									<thead  style='color:white;background: #288CCC'>
										<tr>
											<th style='text-align:center'>Nombre del Partido</th>
											<th style='text-align:center'>Calle</th>
											<th style='text-align:center'>Número</th>
											<th style='text-align:center'>Colonia</th>
											<th style='text-align:center'>Municipio</th>
											<th style='text-align:center'>Estado</th>
											<th style='text-align:center'>País</th>
										</tr>
									</thead>
									<tbody>";
								}
								print "<tr>";
								print "<th> {$partidos['NombrePartido']}</th>";
								print "<th> {$partidos['CallePartido']}</th>";
								print "<th> {$partidos['NumeroPartido']}</th>";
								print "<th> {$partidos['ColoniaPartido']}</th>";
								print "<th> {$partidos['MunicipioPartido']}</th>";
								print "<th> {$partidos['EstadoPartido']}</th>";
								print "<th> {$partidos['PaisPartido']}</th>";
								print "</tr>";
							}
							print "</tbody></table>";
						}
						if ($con==0){
							print "<h3 style='text-align:center; color:red'>No hay solicitudes pendientes</h3>";
						}
					?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
     
  <?php endblock() ?>

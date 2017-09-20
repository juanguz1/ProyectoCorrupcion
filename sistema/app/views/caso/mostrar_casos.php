<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/alertify.min.js"></script>
<script src="js/alertify.js"></script>

<link rel="stylesheet" type="text/css" href="css/alertify.core.css">
<link rel="stylesheet" type="text/css" href="css/alertify.default.css">

 

 <?php startblock('title') ?>
     <h1 class="section-heading">Listado de casos</h1>
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
						if ($data['casos']){								  
							while($casos = $data['casos']->fetch_assoc()){
								$con++;
								if ($con==1){
									print "<table class='table'>
									<thead  style='color:white;background: #288CCC'>
										<tr>
											<th style='text-align:center'>Id Caso</th>
											<th style='text-align:center'>Nombre del caso</th>
											<th style='text-align:center'>Descripción</th>
											<th style='text-align:center'>Desvió</th>
											<th style='text-align:center'>País de Origen</th>
											<th style='text-align:center'>id Periódico</th>
											<th style='text-align:center' width='10%'>Fecha de descubrimiento</th>
											<th style='text-align:center'>Dictamen</th>
										</tr>
									</thead>
									<tbody>";
								}
								print "<tr>";
								print "<th> {$casos['idCaso']}</th>";
								print "<th> {$casos['NombreCaso']}</th>";
								print "<th> {$casos['Descripcion']}</th>";
								print "<th> {$casos['Desvio']}</th>";
								print "<th> {$casos['PaisOrigen']}</th>";
								print "<th> {$casos['idPeriodico']}</th>";
								print "<th> {$casos['FechaDescubrimiento']}</th>";
								print "<th> {$casos['Dictamen']}</th>";
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

<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/alertify.min.js"></script>
<script src="js/alertify.js"></script>

<link rel="stylesheet" type="text/css" href="css/alertify.core.css">
<link rel="stylesheet" type="text/css" href="css/alertify.default.css">



 <?php startblock('title') ?>
     <h1 class="section-heading">Casos Asignados</h1>
  <?php endblock() ?>

 <?php startblock('main') ?>
	<section id="casoslista">
		<div class="row">
			<div class="col-log-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">

					<?php
						while($jueces = $data['jueces']->fetch_assoc()){
							print "<h2 class='section-heading'>{$jueces['NombreCompleto']}</h2>";
						}
						if ($data['casos']){
							$con=0;
							while($casos = $data['casos']->fetch_assoc()){
								$con++;
								if($con==1){
								  print "<table class='table'>
								  <thead  style='color:white;background: #288CCC'>
									<tr>
									  <th style='text-align:center'>Nombre del Caso</th>
									  <th style='text-align:center'>País</th>
									  <th style='text-align:center'>Descubierto</th>
									</tr>
								  </thead>
								  <tbody>";
								}
							//$con=0;
							//while($casos = $data['casos']->fetch_assoc()){
								//$con++;
								print "<tr>";
								print "<th style='text-align:center'> {$casos['NombreCaso']}</th>";
								print "<th style='text-align:center'> {$casos['PaisOrigen']}</th>";
								print "<th style='text-align:center'> {$casos['FechaDescubrimiento']}</th>";
								print "</tr>";
							}
							print "</tbody></table>";
						}
						if($con==0){
							print "<h3 style='text-align:center; color:red'>No hay casos asiganados a ese identificador de juez</h3>";
						}
					?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>

  <?php endblock() ?>

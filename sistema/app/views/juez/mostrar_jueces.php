<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/alertify.min.js"></script>
<script src="js/alertify.js"></script>

<link rel="stylesheet" type="text/css" href="css/alertify.core.css">
<link rel="stylesheet" type="text/css" href="css/alertify.default.css">

 

 <?php startblock('title') ?>
     <h1 class="section-heading">Listado de jueces</h1>
  <?php endblock() ?>

 <?php startblock('main') ?>
	<section id="Periodicoslista">
		<div class="row">
			<div class="col-log-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
					<?php 
						if ($data['jueces']){
							$con=0;									  
							while($periodicos = $data['jueces']->fetch_assoc()){
								$con++;
								if ($con==1){
									print "<table class='table'>
									<thead  style='color:white;background: #288CCC'>
										<tr>
											<th style='text-align:center'>DNI</th>
											<th style='text-align:center'>Nombre (s)</th>
											<th style='text-align:center'>Apellido Paterno</th>
											<th style='text-align:center'>Apellido Materno</th>
											<th style='text-align:center' width='10%'>Fecha Comienzo</th>
										</tr>
									</thead>
									<tbody>";
								}
								print "<tr>";
								print "<th> {$jueces['DNI']}</th>";
								print "<th> {$jueces['Nombre']}</th>";
								print "<th> {$jueces['ApellidoPaterno']}</th>";
								print "<th> {$jueces['ApellidoMaterno']}</th>";
								print "<th> {$jueces['FechaComienzo']}</th>";
								print "</tr>";
							}
							print "</tbody></table>";
						}
						if ($con==0){
							print "<h3 style='text-align:center; color:red'>No existen jueces</h3>";
						}
					?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
     
  <?php endblock() ?>

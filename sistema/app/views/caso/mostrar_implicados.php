<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="js/alertify.min.js"></script>
<script src="js/alertify.js"></script>

<link rel="stylesheet" type="text/css" href="css/alertify.core.css">
<link rel="stylesheet" type="text/css" href="css/alertify.default.css">



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

              print "<table class='table'>
              <thead  style='color:white;background: #288CCC'>
                <tr>
                  <th style='text-align:center'>Nombre Completo</th>
                  <th style='text-align:center'>País</th>
                  <th style='text-align:center'>Patrimonio</th>
                </tr>
              </thead>
              <tbody>";
							//$con=0;
							while($implicados = $data['implicados']->fetch_assoc()){
								//$con++;



								print "<tr>";
								print "<th> {$implicados['NombreCompleto']}</th>";
								print "<th> {$implicados['Pais']}</th>";
								print "<th> {$implicados['Patrimonio']}</th>";
								print "</tr>";
              }
              print "</tbody></table>";
						}
						else{
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

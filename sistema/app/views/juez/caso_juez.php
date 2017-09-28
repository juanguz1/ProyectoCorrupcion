<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>

 <?php startblock('title') ?>
     Asignar caso a juez
  <?php endblock() ?>






 <?php startblock('main') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			Introducir los siguientes datos
        </div>

		<div class="panel-body">
			<div class="row">
                <div class="col-lg-6">
                    <form role="form" action="Agregar_caso_juez" method="post" >
                        <div class="form-group">



                          <label>Nombre del caso a Asignar</label>
                        <?php
                           print "<select class='form-control' name='idCaso' id='idCaso' >";
                             while ($casos=$data['casos']->fetch_assoc()) {
                               print "<option value={$casos['idCaso']}>{$casos['NombreCaso']}</option>";
                             }
                             print"</select>"
                          ?>

                        <br>
                        <label>Nombre del Juez</label>
                        <?php
                           print "<select class='form-control' name='idJuez' id='idJuez' >";
                             while ($jueces=$data['jueces']->fetch_assoc()) {
                               print "<option value={$jueces['idJuez']}>{$jueces['NombreCompleto']}</option>";
                             }
                             print"</select>"
                          ?>



                      <input type="submit" value="Guardar" class="form-control" name="Guardacaso" />
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>

<?php startblock('scripts') ?>
<script src="<?= $url_path ?>interno/js/angular/services/estudianteFactory.js"></script>
<script src="<?= $url_path ?>interno/js/angular/controllers/EEController.js"></script>

<?php endblock() ?>

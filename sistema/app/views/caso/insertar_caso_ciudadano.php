<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>

 <?php startblock('title') ?>
     Añadir nuevo ciudadano
  <?php endblock() ?>






 <?php startblock('main') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			Introducir los siguientes datos
        </div>

		<div class="panel-body">
			<div class="row">
                <div class="col-lg-6">
                    <form role="form" action="Agregar_inputado" method="post">
                        <div class="form-group">



                          <?php
                             print "<select class='form-control' name='idCiudadano' id='idCiudadano'";
                               while ($ciudadanos=$data['ciudadanos']->fetch_assoc()) {
                                 print "<option value={$ciudadanos['idCiudadano']}>{$ciudadanos['NombreCompleto']}</option>";
                               }
                               print"</select>"
                            ?>
                        <?php
                           print "<select class='form-control' name='idCaso' id='idCaso'";
                             while ($casos=$data['casos']->fetch_assoc()) {
                               print "<option value={$casos['idCaso']}>{$casos['NombreCaso']}</option>";
                             }
                             print"</select>"
                          ?>
                        <br>

                        <label>Cargo que se le imputa</label>
                        <input name="Cargo" id="Cargo" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>

                      <input type="submit" value="Guardar" class="form-control" name="GuardaCiudadano" />
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

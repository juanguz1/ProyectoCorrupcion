<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>

 <?php startblock('title') ?>
     Añadir nuevo Partido
  <?php endblock() ?>

 <?php startblock('main') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			Introducir los siguientes datos
        </div>

		<div class="panel-body">
			<div class="row">
                <div class="col-lg-6">
                    <form role="form" action="Agregar_partido" method="post">
                        <div class="form-group">
                            <label>Nombre Partido</label>
                            <input name="NombrePartido" id="NombrePartido" class="form-control" required>
							               <p class="help-block">* Campo Obligatorio.</p>

                        <h1>Dirección</h1>
                        <label>Calle</label>
                        <input name="CallePartido" id="CallePartido"class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Número</label>
                        <input name="NumeroPartido" id="NumeroPartido" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Colonia</label>
                        <input name="ColoniaPartido" id="ColoniaPartido" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Estado</label>
                        <input name="EstadoPartido" id="EstadoPartido" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Pais</label>
                        <input name="PaisPartido" id="PaisPartido" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <input type="submit" value="Guardar" class="form-control" name="GuardaPartido" />
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

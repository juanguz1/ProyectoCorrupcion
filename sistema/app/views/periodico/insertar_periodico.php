<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>

 <?php startblock('title') ?>
     Añadir nuevo periódico
  <?php endblock() ?>

 <?php startblock('main') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			Introducir los siguientes datos
        </div>

		<div class="panel-body">
			<div class="row">
                <div class="col-lg-6">
                    <form role="form" action="Agregar_Periodico" method="post">
                        <div class="form-group">
                            <label>Nombre Periódico</label>
                            <input name="NombrePeriodico" id="NombrePeriodico" class="form-control" required>
                            <p class="help-block">* Campo Obligatorio.</p>

							<label>Tiraje</label>
                            <input name="Tiraje" id="Tiraje" class="form-control" required>
                            <p class="help-block">* Campo Obligatorio.</p>

							<h1>Dirección</h1>

                                <label>Calle</label>
                                <input name="CallePeriodico" id="CallePeriodico" class="form-control" required>
                                <p class="help-block">* Campo Obligatorio.</p>

                                <label>Número</label>
                                <input name="NumeroPeriodico" id="NumeroPeriodico" class="form-control" required>
                                <p class="help-block">* Campo Obligatorio.</p>

                                <label>Colonia</label>
                                <input name="ColoniaPeriodico" id="ColoniaPeriodico" class="form-control" required>
                                <p class="help-block">* Campo Obligatorio.</p>

                                <label>Municipio</label>
                                <input name="MunicipioPeriodico" id="MunicipioPeriodico" class="form-control" required>
                                <p class="help-block">* Campo Obligatorio.</p>

                                <label>Estado</label>
                                <input name="EstadoPeriodico" id="EstadoPeriodico" class="form-control" required>
                                <p class="help-block">* Campo Obligatorio.</p>

                                <label>País</label>
                                <input name="PaisPeriodico" id="PaisPeriodico" class="form-control" required>
                                <p class="help-block">* Campo Obligatorio.</p>


								<input type="submit" value="Guardar" class="form-control" name="GuardaPeriodico" />
							</form>
						</div>
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

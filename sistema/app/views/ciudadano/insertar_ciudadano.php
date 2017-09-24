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
                    <form role="form" action="Agregar_Ciudadano" method="post">
                        <div class="form-group">
                          <label>Clave ciudadano</label>
                          <input name="idCiudadano" id="idCiudadano" class="form-control" required>
            <p class="help-block">* Campo Obligatorio.</p>


                            <label>Nombre</label>
                            <input name="Nombre" id="Nombre" class="form-control" required>
							              <p class="help-block">* Campo Obligatorio.</p>

                            <label>Apellido Paterno</label>
                            <input name="ApellidoPaterno" id="ApellidoPaterno"class="form-control" required>
                            <p class="help-block">* Campo Obligatorio.</p>

                            <label>Apellido Materno</label>
                            <input name="ApellidoMaterno" id="ApellidoMaterno" class="form-control" required>
                            <p class="help-block">* Campo Obligatorio.</p>

                            <label>Fecha nacimiento</label>
                            <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control" required>
                            <p class="help-block">* Campo Obligatorio.</p>

                						<label>Patrimonio</label>
                							<div class="form-group input-group">
                								<span class="input-group-addon">$</span>
                									<input name="Patrimonio" id="Patrimonio" type="text" class="form-control" required>
                								<span class="input-group-addon">.00</span>
                							</div>
                							<p class="help-block">* Campo Obligatorio.</p>


                        <h1>Direccion</h1>

                        <label>Calle</label>
                        <input name="Calle" id="Calle" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Número</label>
                        <input name="Numero" id="Numero" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Colonia</label>
                        <input name="Colonia" id="Colonia" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Municipio</label>
                        <input name="Municipio" id="Municipio" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Estado</label>
                        <input name="Estado" id="Estado" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>

                        <label>Pais</label>
                        <input name="Pais" id="Pais" class="form-control" required>
                        <p class="help-block">* Campo Obligatorio.</p>


                        <label>Afiliado a partido</label><br>
                        <input type="checkbox" id="afiliado" name="afiliado" value="1" onchange="habilitar(this.checked);">

                        <label>Puesto</label>
                        <input name="Puesto" id="Puesto" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>

                        <?php
                           print "<select class='form-control' name='NombrePartido' id='NombrePartido'";
                             while ($partidos=$data['partidos']->fetch_assoc()) {
                               print "<option value={$partidos['NombrePartido']}>{$partidos['NombrePartido']}</option>";
                             }
                             print"</select>"
                          ?>
                        <br>

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

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
                    <form role="form">
                        <div class="form-group">
                            <label>Nombre Periódico</label>
                            <input name="NombrePeriodico" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>
							
							<label>Tiraje</label>
                            <input name="Tiraje" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>
							
							<h1>Dirección</h1>
                            <form role="form">
                                <label>Calle</label>
                                <input name="callePeriodico" class="form-control">
                                <p class="help-block">* Campo Obligatorio.</p>
                                            
                                <label>Número</label>
                                <input name="numeroPeriodico" class="form-control">
                                <p class="help-block">* Campo Obligatorio.</p>
                                          
                                <label>Colonia</label>
                                <input name="coloniaPeriodico" class="form-control">
                                <p class="help-block">* Campo Obligatorio.</p>
                                           
                                <label>Estado</label>
                                <input name="estadoPeriodico" class="form-control">
                                <p class="help-block">* Campo Obligatorio.</p>
                                            
                                <label>País</label>
                                <input name="paisPeriodico" class="form-control">
                                <p class="help-block">* Campo Obligatorio.</p>
                                              
                                <label>Afiliado a partido</label><br>
                                <input type="checkbox" id="check2" onchange="habilitar2(this.checked);">
                                               
                                <label>Partido</label>
                                <select id="Partido" disabled  >
                                    <option style="display:none"></option>
                                    <option value="PRI">PRI</option> 
                                </select>
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
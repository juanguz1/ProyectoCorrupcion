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
                    <form role="form">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombreCiud" class="form-control">
							<p class="help-block">* Campo Obligatorio.</p>
                                                
                            <label>Apellido Paterno</label>
                            <input name="apellidoPaterno" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>
                                                
                            <label>Apellido Materno</label>
                            <input name="apellidoMaterno" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>
                                                
                            <label>Fecha nacimiento</label>
                            <input type="date" name="FechaNacimiento" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>
							<label>Patrimonio</label>
							<div class="form-group input-group">
								<span class="input-group-addon">$</span>
									<input name="patrimonio" type="text" class="form-control">
								<span class="input-group-addon">.00</span>
							</div>
							<p class="help-block">* Campo Obligatorio.</p>
                        </div>
                                            
                    </form>
                </div>
                
                <div class="col-lg-6">
                    
                    <form role="form">
                        <label>Calle</label>
                        <input name="calle" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>
                                   
                        <label>Número</label>
                        <input name="numero" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>
                                     
                        <label>Colonia</label>
                        <input name="colonia" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>
                                           
                        <label>Estado</label>
                        <input name="estado" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>
                                            
                        <label>Pais</label>
                        <input name="estado" class="form-control">
                        <p class="help-block">* Campo Obligatorio.</p>
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
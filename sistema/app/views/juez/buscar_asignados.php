<?php include($_SERVER['DOCUMENT_ROOT']."/ProyectoCorrupcion/sistema/app/views/base_dashboard.php");?>

 <?php startblock('title') ?>
     Buscar implicados en caso
  <?php endblock() ?>

 <?php startblock('main') ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			Introducir los siguientes datos
        </div>

		<div class="panel-body">
			<div class="row">
                <div class="col-lg-8">
				<div class="modal-body">
					<div class="col-md-12">
						<h6>Datos marcados con <span style="color:red;">*</span> son forzosos.</h6>
					</div>
					<form role="form" action="listar_asignados" method="post">


							<div class="form-group">
								<label for="inputEmail3" class="col-sm-7 control-labe">Clave de juez a buscar  <span style="color:red;">*</span></label>
								<div class="col-sm-10">
									<input  name="idJuez" id="idJuez" required>
								<!--<input type="text" class="form-control" id="FechaComienzo" name="FechaComienzo" placeholder="Ingrese fecha" ng-keypress="valida_RFC()" ng-model="rfc">
								<span ng-show="checkRFC" style="color: red;"> Ingrese fecha de comienzo-->
								<br>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" value="Buscar" class="form-control" name="Buscar" />
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
      </div>


	<script src="<?= $url_path?>Interno/js/jquery-3.1.1.min.js" type="text/javascript"></script>

<?php endblock() ?>

<?php startblock('scripts') ?>
<!--<script src="< ?= $url_path ?>interno/js/angular/services/estudianteFactory.js"></script>
<script src="< ?= $url_path ?>interno/js/angular/controllers/EEController.js"></script>-->

<?php endblock() ?>

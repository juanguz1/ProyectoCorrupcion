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
                    <form role="form" action="Agregar_Caso" method="post">
                        <div class="form-group">
                            <label>Clave Caso</label>
                            <input name="idCaso" id="idCaso" class="form-control">
                             <p class="help-block">* Campo Obligatorio.</p>

                            <label>Nombre del Caso</label>
                            <input name="NombreCaso" id="NombreCaso" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>

                            <label>Descripcion</label>
                            <input name="Descripcion" id="Descripcion" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>

                            <label>Desvio</label>
                            <div class="form-group input-group">
                              <span class="input-group-addon">$</span>
                                <input name="Desvio" id="Desvio" type="number" min="1" class="form-control">
                              <span class="input-group-addon">.00</span>
                            </div>

                            <label>País origen</label>
                            <input type="text" name="PaisOrigen" id="PaisOrigen" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>

                            <label>Fecha de descubrimiento</label>
                            <input type="date" name="FechaDescubrimiento" id="FechaDescubrimiento" class="form-control">
                            <p class="help-block">* Campo Obligatorio.</p>
                            <label>Periodico</label>
                            //   <?php
                                print "<select class='form-control' name='idPeriodico' id='idPeriodico'";
                                  while ($periodico=$data['periodicos']->fetch_assoc()) {
                                    print "<option value={$periodico['NombrePeriodico']}>{$periodico['NombrePeriodico']}</option>";
                                  }
                                  print"</select>"
                                ?>//

                            <h1>Dictamen</h1>
                            <label>Resuelto</label>
                            <input type="checkbox" name="Dictamen" id="Dictamen" value="1" class="form-control">
                            
                            <p class="help-block">* Campo Obligatorio.</p>
                            <input type="submit" value="Guardar" class="form-control" name="GuardaCaso" />
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

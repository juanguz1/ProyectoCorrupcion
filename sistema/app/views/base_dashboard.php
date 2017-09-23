<?php require_once 'ti.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <!-- Bootstrap Core CSS -->
    <link href="<?= $url_path ?>interno/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= $url_path ?>interno/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?= $url_path ?>interno/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= $url_path ?>interno/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= $url_path ?>interno/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= $url_path ?>interno/js/alertifyjs/css/alertify.css" rel="stylesheet" type="text/css">

    <link href="<?= $url_path ?>interno/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
                <a class="navbar-brand" href="inicio">Sistema Gestor de Casos de Corrupción</a>

        </div>

       <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <ul class="dropdown-menu dropdown-user">
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <small class="text-muted">
                                Menú de navegación
                            </small>
                        </div>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-bank fa-fw"></i> Casos de corrupción<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Antes_Caso">Añadir caso</a>
                            </li>
							<li>
                                <a href="#">Editar caso</a>
                            </li>

                            <li>
                                  <a href="imputado">Agregar imputados</a>
                            </li>
							<li>
                                <a href="Ver_Casos">Ver casos</a>
                            </li>
							<li>
                                <a href="#">Eliminar caso</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Ciudadanos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Antes_Ciudadano">Añadir ciudadano</a>
                            </li>
							<li>
                                <a href="#">Editar ciudadano</a>
                            </li>
							<li>
                                <a href="Ver_Ciudadanos">Ver ciudadanos</a>
                            </li>
							<li>
                                <a href="#">Eliminar ciudadano</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gavel fa-fw"></i> Juez<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="registrar_cuentaJuez">Añadir juez</a>
                            </li>
							<li>
                                <a href="#">Editar juez</a>
                            </li>
							<li>
                                <a href="Ver_Jueces">Ver juez</a>
                            </li>
							<li>
                                <a href="#">Eliminar juez</a>
                            </li>
                        </ul>
                    </li>

					<li>
                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Periódico<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="periodico">Añadir periódico</a>
                            </li>
							<li>
                                <a href="#">Editar periódico</a>
                            </li>
							<li>
                                <a href="Ver_Periodicos">Ver periódicos</a>
                            </li>
							<li>
                                <a href="#">Eliminar periódico</a>
                            </li>
                        </ul>
                    </li>

					<li>
                        <a href="#"><i class="fa fa-bookmark fa-fw"></i> Partido<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Antes_Partido">Añadir partido</a>
                            </li>
							<li>
                                <a href="#">Editar partido</a>
                            </li>
							<li>
                                <a href="Ver_Partidos">Ver partidos</a>
                            </li>
							<li>
                                <a href="#">Eliminar partido</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper" ng-app="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> <?php emptyblock('title')?></h1>
                </div>
            </div>
            <?php emptyblock('main') ?>
            <!-- ... Your content goes here ... -->

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="<?= $url_path ?>interno/js/jquery-3.1.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= $url_path ?>interno/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= $url_path ?>interno/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= $url_path ?>interno/js/startmin.js"></script>
<!-- alertas-->
<script src="<?= $url_path ?>interno/js/alertifyjs/alertify.min.js"> </script>

<!-- angular -->

<script src="<?= $url_path ?>interno/js/angular/angular.min.js"></script>
<script src="<?= $url_path ?>interno/js/angular/angular-file-model.js"></script>
<script src="<?= $url_path ?>interno/js/angular/angular-resource.js"></script>
<script src="<?= $url_path ?>interno/js/angular/ng-file-upload-shim.min.js"></script>
<script src="<?= $url_path ?>interno/js/angular/ng-file-upload.min.js"></script>
<script src="<?= $url_path ?>interno/js/angular/app.js"></script>
<?php emptyblock('scripts') ?>
</body>
</html>

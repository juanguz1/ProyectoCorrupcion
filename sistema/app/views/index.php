<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>

    <style>
        #primerMensaje:hover{
            cursor:pointer;
        }
    </style>
    <!-- Bootstrap Core CSS -->
    <link href="<?= $url_path ?>index/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?= $url_path ?>index/css/landing-page.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="<?= $url_path ?>index/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body ng-app="app">

    <div id = "wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style=" background-color: white;">
            <div class="container topnav" style="text-align:right;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" style="height: 80px;">
                    <img class="img-responsive" style="width: 300px; height: 60px; position: absolute; right: 80px; top:20px;" src= "<?= $url_path ?>escudos/ipn.jpg">
                    <img class="img-responsive" style="width: 150px; height: 60px; position: absolute; left: 80px; top:20px;" src= "<?= $url_path ?>escudos/ESCOM.png">
                    <!--<img class="img-responsive" style="width: 300px; height: 60px; position: absolute; left: 80px; top:20px;" src= "<?= $url_path ?>escudos/SEP1.jpg">-->
                </div>
            </div>
        </nav>

        <div id="page-wrapper" style="min-height: 621px;">
            <div class="content-section-a">

                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 col-sm-6">
                            <h1 class="page-header">Sistema Gestor de casos de corrupción</h1>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-bank fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">Casos de corrupción</div>
                                            </div>
                                        </div>    
                                    </div> 

                                    <a href="Index/caso">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">Ciudadanos</div>
                                            </div>
                                        </div>    
                                    </div> 

                                    <!--<a href="Estudiante_Egresado/Solicitar_Tramite">-->
									<a href = "Index/ciudadano">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-gavel fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">Juez</div>
                                            </div>
                                        </div>    
                                    </div> 

                                    <a href="Index/juez">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-newspaper-o fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">Periódicos</div>
                                            </div>
                                        </div>    
                                    </div> 

                                    <a href="Index/periodico">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-bookmark fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">Partidos</div>
                                            </div>
                                        </div>    
                                    </div> 

                                    <a href="Index/partido">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ver detalles</span>
                                            <span class="pull-right">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container -->

            </div>
        </div>
    </div>
    <!-- jQuery-->
    <script src="<?= $url_path ?>index/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $url_path ?>index/js/bootstrap.min.js"></script>


    <!-- angular 
    <script src="< ?= $url_path ?>interno/js/angular/angular.min.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/angular-resource.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/angular-file-model.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/ng-file-upload-shim.min.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/ng-file-upload.min.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/app.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/services/indexFactory.js"></script>
    <script src="< ?= $url_path ?>interno/js/angular/controllers/IndexController.js"></script>
    <script src="< ?= $url_path ?>interno/js/alertifyjs/alertify.min.js"> </script>
</body>

</html>
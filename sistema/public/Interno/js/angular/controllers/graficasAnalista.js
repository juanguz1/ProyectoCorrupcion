app. 
controller('graficasController', function($scope,jefaGestionFactory){
  $scope.numeroMes_aux_1 = ['0','0','0','0','0','0','0','0','Agosto', 'Septiembre','Octubre','Noviembre','Diciembre'];
  $scope.numeroMes_aux_2 = ['Enero', 'Febrero','Marzo','Abril','Mayo'];
  $scope.analistas;
  $scope.contador=0;
  var d = new Date();
  var n = d.getMonth();
  $scope.tabla = false;
  $scope.estado = "0";
  $scope.documento = "0";
  $scope.motivo = "1";
  jefaGestionFactory.get_analistas(function(analistas){
    $scope.analistas = analistas.resultado;
    
  });
  $scope.get_mes = function(mes){
    if (n >= 8){
      return $scope.numeroMes_aux_1[mes];
    } 
    else{
      return $scope.numeroMes_aux_2[mes];
    }
  };
  $scope.create_query = function(){
    $scope.contador=0;
    $scope.b_grafica = false;
    $scope.datos = new Array();
    $scope.datos1 = new Array();
    $scope.validador = 0;

    for(i=0; i<$scope.analistas.length; i++){
      $scope.datos.push({name:$scope.analistas[i].nombre,data:[],id:$scope.analistas[i].id});
    }
    $scope.mes_chart = [];
    $scope.arregloResultados = new Array();
    if($scope.estado !="null" || $scope.documento !="null" || $scope.motivo != "null"){
      if($scope.inicio == undefined){
        alertify.error('Favor de llenar un inicio de periodo.');
        $scope.validador = 1;
      }
      if($scope.fin == undefined){
         alertify.error('Favor de llenar un fin de periodo.');
         $scope.validador = 1;
      }
      if($scope.estado == "null"){
        alertify.error('Favor de llenar el estado en el que se desea buscar el documento.');
        $scope.validador = 1;
      }
      if($scope.documento == "null"){
        alertify.error('Favor de llenar el tipo de documento a buscar.');
        $scope.validador = 1;
      }
      if($scope.motivo == "null"){
        alertify.error('Favor de llenar el motivo de petición del documento.');
        $scope.validador = 1;
      }
      //console.log($scope.validador);
      if($scope.validador == 0){
      $scope.tabla = true;  
      var query;
      query = "select count(*) as tramites, persona.idPersona, persona.nom  from tramite,persona,estadotramite,documento, motivo,solicitud where tramite.idAnalista = persona.idPersona and tramite.idTramite = solicitud.idSolicitud";
      if($scope.estado != "null")
        query = query + " and tramite.idEstado = estadotramite.idEstado ";
      if($scope.documento != "null")
        query = query + " and solicitud.Documento_idDocumento = documento.idDocumento";
      if($scope.motivo != "null")
        query = query + " and solicitud.Motivo_idMotivo = motivo.idMotivo";
      
      if($scope.estado != "null" && $scope.estado != 0)
        query = query + " and tramite.idEstado = "+$scope.estado;
      if($scope.documento != "null" &&  $scope.documento != 0)
        query = query + " and solicitud.Documento_idDocumento ="+$scope.documento;
      if($scope.motivo != "null" && $scope.motivo != 1)
        query = query + " and solicitud.Motivo_idMotivo ="+$scope.motivo;
      if($scope.inicio != undefined && $scope.fin != undefined){
        var inicio = $scope.inicio.split("-")[1];
        var anio = $scope.inicio.split("-")[0];
        var fin = $scope.fin.split("-")[1];
        console.log(inicio +"   "+fin);
        var k=inicio;
        for(var i= parseInt(inicio),j=inicio; i <= parseInt(fin); i++,j++){
          var query_aux = query;
          
          if(i < 10)
            query_aux = query_aux+ " and solicitud.fecha like '" +anio+"-0"+i+"%'";
          else
            query_aux = query_aux+ " and solicitud.fecha like '" +anio+"-"+i+"%'";
          query_aux = query_aux+ " group by persona.idPersona;";
          //console.log(query_aux);
          if (n >= 8)
            $scope.mes_chart.push($scope.numeroMes_aux_1[j]);
          else
            $scope.mes_chart.push($scope.numeroMes_aux_2[j]);
          jefaGestionFactory.get_data_graph({query:query_aux}, function(resultado){
            $scope.arregloResultados.push(resultado);
            $scope.crear_arreglo(resultado.resultado);
            alertify.success("Se han obtenido los resultados del mes "+ $scope.numeroMes_aux_1[k]);
            k++;            
          });
        }
      }
    }else{
        query = query + " group by persona.idPersona;";
      }
      
    }else{
      if($scope.estado == undefined) 
        alertify.error('Favor de llenar el estado en el que se desea buscar el documento.');
      if($scope.documento == undefined) 
        alertify.error('Favor de llenar el tipo de documento');
      if($scope.motivo == undefined) 
        alertify.error('Favor de llenar el motivo de petición del documento.');
    }
    $scope.arregloResultados = $scope.arregloResultados;
    //$scope.grafica($scope.mes_chart,$scope.arregloResultados,$scope.analistas);
  };

  $scope.crear_arreglo = function (mes) {
    var i;
    for(i=0; i<$scope.datos.length; i++){
      for(j=0; j<mes.length;j++){
        if($scope.datos[i].id == mes[j].idAnalista){
          $scope.datos[i].data.push(parseInt(mes[j].tramites));
        }
      }
    }
  };  
  $scope.crear_grafica = function(datos){
    console.log(datos);
    console.log($scope.mes_chart);
    $scope.cargando = true;
    $scope.contador++;
    for(i=0; i<$scope.datos.length; i++){
      var suma = 0;
      for(j=0; j<$scope.datos[i].data.length;j++){
        suma += $scope.datos[i].data[j];
      }
      $scope.datos1.push({name:$scope.datos[i].name, y: suma,sliced:true});
    }
    console.log($scope.datos1);
    $("#graph1").highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Desempeño mensual por analista'
        },
        xAxis: {
            categories: $scope.mes_chart,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: datos
      });
      $scope.b_grafica = true;
      sleep(1700).then(()=>{
        $("#cargando").css("display","none");
        $("#b_grafica").css("display","block");
      });

      $("#graph2").highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Desempeño global en el periodo determinado por analista '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: $scope.datos1/*[{
                name: 'Microsoft Internet Explorer',
                y: 56.33
            }, {
                name: 'Chrome',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Firefox',
                y: 10.38
            }, {
                name: 'Safari',
                y: 4.77
            }, {
                name: 'Opera',
                y: 0.91
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2
            }]*/
        }]
});

    if($scope.contador <=1)
      alertify.success("Si se requiere acercar la gráfica dar click otra vez en el botón.");
  };
});
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}

app. 
controller('memorandumController', function($scope,departamentoFactory,Upload){
  $scope.files = [];
  $scope.terminaciones = [];
  $scope.$watch('file', function (newVal) {
    if (newVal){
        if(newVal.name.split(".")[1] == "docx" || newVal.name.split(".")[1] == "pdf" || newVal.name.split(".")[1] == "xlsx"){
          $scope.files.push(newVal);
          $scope.terminaciones.push(newVal.name.split(".")[1]);
          alertify.success("Se ha cargado el archivo " + newVal.name);
          Upload.upload({
            url: '/Proyecto_IS/ProyectoSemestreIS/sistema/public/Departamento_Escolar/agregar_memorandum',
            data:{file:newVal}
          }).then(function(resp){
            console.log("subido");
          });
        }else{
          alertify.error("No se ha podido cargar el archivo. Sube un archivo con extensión valida.");
        }
    }
    console.log($scope.files);
    console.log($scope.terminaciones);
  });
  $scope.getImg = function($index){
    return $scope.terminaciones[$index];
  }
})

;
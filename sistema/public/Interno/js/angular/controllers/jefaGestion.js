app. 
controller('notificacionController',function($scope,jefaGestionFactory){
  jefaGestionFactory.get_no_memorandums(function(regreso){
    $scope.memorandums_no_leidos = regreso.numero;
  });  
}). 
controller('getMemorandum', function($scope,jefaGestionFactory){
  $scope.changeButton = function(id){
    jefaGestionFactory.update_memorandum({id:id},function(resultado){
      //location.reload();
    });
  };
});
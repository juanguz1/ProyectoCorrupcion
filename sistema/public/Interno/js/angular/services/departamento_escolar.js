app. 
factory('departamentoFactory', function($resource){
  var url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  var url_memorandum = url_path + "Departamento_Escolar/agregar_memorandum";
  return $resource(url_path,null,{
    post_solicitudes : {
      method:'POST',
      isArray:false,
      contentType: 'multipart/form-data',
      url: url_memorandum,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }
  });
});
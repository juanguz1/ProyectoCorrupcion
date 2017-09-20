app. 
factory('estudianteFactory', function($resource){
  var url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  var url_enviar_peticion = url_path+"Estudiante_Egresado/Enviar_Peticion";
  var url_get_tipo = url_path+"Estudiante_Egresado/get_EE";
  var url_update_email = url_path+"Estudiante_Egresado/update_email";
  return $resource(url_path,null,{
    post_solicitudes : {
      method:'POST',
      isArray:false,
      url: url_enviar_peticion,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    },
    get_tipo : {
      method:'GET',
      isArray:false,
      url: url_get_tipo
    },
    update_email : {
      method:'POST',
      isArray:false,
      url: url_update_email,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }
  });
});
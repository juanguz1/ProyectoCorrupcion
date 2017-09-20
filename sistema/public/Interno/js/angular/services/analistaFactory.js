app. 
factory('analistaFactory', function($resource){
  var url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  var url_aceptar_solicitud = url_path+"Analista_solicitudes/Peticion_Acep";
  var url_get_boleta = url_path+"Analista_solicitudes/get_boleta";
  var url_update_email = url_path+"Analista_solicitudes/update_alumno_email";
  var url_post_solicitudes = url_path+"Analista_solicitudes/Enviar_Peticion_documento";
  return $resource(url_path,null,{
    post_solicitudes : {
      method:'POST',
      isArray:false,
      url: url_aceptar_solicitud,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    },
    get_boleta : {
      method:'POST',
      isArray:false,
      url: url_get_boleta,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    },
    update_email : {
      method:'POST',
      isArray:false,
      url: url_update_email,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    },
    post_solicitudes_documentos : {
      method:'POST',
      isArray:false,
      url: url_post_solicitudes,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    },
  });
});
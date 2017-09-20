app. 
factory('indexFactory', function($resource){
  var url_path = "/Proyecto_IS/ProyectoSemestreIS/sistema/public/";
  var url_iniciar_sesion = url_path+"Index/Login";
  var url_iniciar_sesion_trabajador = url_path+"Index/LoginT";
  return $resource(url_path,null,{
    login : {
      method:'POST',
      isArray:false,
      url: url_iniciar_sesion,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    },
    loginTrabajador : {
      method:'POST',
      isArray:false,
      url: url_iniciar_sesion_trabajador,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }
  });
});
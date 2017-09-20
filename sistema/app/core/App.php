<?php

class App
{
  protected $controller = 'Home';
  protected $method = 'index'; 
  protected $params = [];
  // contrador,metodo y parametros por default

  public function __construct()
  {
     $url = $this->parseUrl();

    if(file_exists('../app/controllers/'.$url[0] .'.php')){ //existe el controlador?
      $this->controller = $url[0];
      unset($url[0]);
    }
    require_once '../app/controllers/'. $this->controller . '.php';
    $this->controller = new $this->controller; //creamos nueva instancia del objeto 
    if(isset($url[1])){ //existe el metodo?
      if(method_exists($this->controller,$url[1])){
        $this->method = $url[1];
        unset($url[1]); //quitamos del arreglo de tal manera que solo queden parametros
      }
    }
    $this->params = $url ? array_values($url) : []; // si no hay parametros regresamos arreglo vacio
    call_user_func_array([$this->controller, $this->method], $this->params);



  }

  public function parseUrl()
  {
    if(isset($_GET['url'])){
      return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL)); 
      // rtrim quita los espacios en blanco o los caracteres al lado derecho de un cierto caracter
      // filter_var Filtra una variable con el filtro que se indique
      // The FILTER_SANITIZE_URL filter removes all illegal URL characters from a string. This filter allows all letters, digits and $-_.+!*'(),{}|\\^~[]`"><#%;/?:@&=
      // explode convierte un string en un array siendo la separacion un caracter
    } 
  }
}
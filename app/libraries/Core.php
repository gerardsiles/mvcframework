<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      //print_r($this->getUrl());

      $url = $this->getUrl();

      // Look in "controllers" for first value
      //ucwords convierte en mayúscula la primera letra de cada palabra
      // $url[0] es la primera parte de la dirección
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index. Primera parte de la direccion
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of url
      // $url[1] es la segunda parte de la dirección
      //isset checkea si una variable está declarada y su valor es diferente de null
      if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          // Unset 1 index
          unset($url[1]);
        }
      }

      // Get params
      //? es un ternary operator.  Condition ? resultTrue : resultFalse
      // ¿hay url? ---   si lo hay devuelve array_values(url)   ---  si no lo hay devuelve [] (array vacio)
      $this->params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
      if(isset($_GET['url'])){

      //rtrim elimina los espacios en blanco u otros caracteres al final de una cadena
      //primer parámetro es el string a manejar
       //el segundo los caracteres diferentes a un espacio en blanco que queremos eliminar
        $url = rtrim($_GET['url'], '/');

        //filter_var filtra una variable con un filtro especifico
        //FILTER_SANITIZE_URL  Remove all characters except letters, digits and $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
        $url = filter_var($url, FILTER_SANITIZE_URL);

        //explode divide un string en un array de strings
        //el primer parámetro marca el separado y el segundo es el string a dividir
        $url = explode('/', $url);
        return $url;
      }
    }
  }



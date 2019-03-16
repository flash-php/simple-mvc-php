<?php

class App {
  // Default route
  protected $controller = 'home';
  protected $methode = 'index';

  
  // Templating
  protected $params = [];


  // Constructor
  public function __construct() {
    $url = $this->parseUrl();

    // Check if the controller exists [USE DEFAULT if not found]
    if (file_exists('app/controllers/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      
      // Remove from array
      unset($url[0]);
    }

    // Load in php file of the controller
    require_once 'app/controllers/' . $this->controller . '.php'; 

    // set controller to the Controller object
    $this->controller = new $this->controller;

    // Check if the methode exists
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->methode = $url[1];
      unset($url[1]);
    }

    // Add params to the param list if there are any and rebase array to 0
    $this->params = $url ? array_values($url) : [];

    // Call method with params
    call_user_func_array([$this->controller, $this->methode], $this->params);

  }


  // Parse url and put directory's in an url array
  protected function parseUrl() {
    if (isset($_GET['url'])) {
      // Return an array of url parameters
      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }

}
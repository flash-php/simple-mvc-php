<?php

class Controller {
  protected function model($model) {
    // TODO: Check if exsists

    require_once 'app/models/' . $model . '.php';
    return new $model;
  }
  
  protected function view($view, $data = []) {
    // TODO: Check for valid view
    
    // Split view into view dir and view file.php
    $view = explode('/', $view);
    $view_dir = $view[0];
    $view_file = $view[1];

    // Check if there is a template folder otherwise use global template folder
    $template_path = file_exists("app/views/$view_dir/templates/") ? "app/views/$view_dir/templates/" : "app/templates/";
    
    // Include view
    include "$template_path/header.php";
    require_once "app/views/$view_dir/$view_file.php";
    include "$template_path/footer.php";
  }

}
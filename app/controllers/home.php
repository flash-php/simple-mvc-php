<?php

class Home Extends Controller {
  public function index($name = '') {
    // $user = $this->model('User');
    // $user->name = $name;

    
    $festival = $this->model('Festival');
  
    $this->view('home/index', ['name' => $name, 'festivals' => $festival->getData()]);
    
    IO::console_log('/home/index');
  }
}
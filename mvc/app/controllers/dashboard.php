<?php

class Dashboard Extends Controller {
  public function index() {
    IO::console_log('dashboard/index');
  }
  
  public function test() {
    IO::console_log('dashboard/test');
  }
}
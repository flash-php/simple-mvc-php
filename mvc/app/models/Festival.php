<?php

class Festival extends Model {
  public function getData() {
    return $this->query('SELECT * FROM festivals LIMIT 3');
  }
}
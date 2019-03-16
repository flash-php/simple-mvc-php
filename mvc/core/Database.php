<?php

require_once 'core/config/database.php';

class Model {
  // Connect to a database
  private static function connect() {
    $connection_string =  
    'pgsql:host=' . DB_HOST .
    ';port=' . DB_PORT . 
    ';dbname=' . DB_NAME . 
    ';user=' . DB_USERNAME . 
    ';password=' . DB_PASSWORD;

    try {
      $connection = new PDO($connection_string);

      if ($connection) {
        IO::console_log("Connected to the database successfully!");
        return $connection;
      }

    }
    catch(PDOException $error) {
      console_log($error->getMessage());
      return NULL;
    }
  }

  // Execute a query
  protected function query($query, $params = []) {
    $connection = self::connect();
    if ($connection) {
      $prep = $connection;
      $prep = $connection->prepare( $query );

      foreach ($params as $param) {
        $prep->bindParam(...$param);
      }

      $prep->execute();
      
      // Check if the pgsql query is a select statement
      if (explode(" ", $query)[0] == "SELECT") {
        $data = $prep->fetchAll();
        return $data;
      } 

    }
    else {
      IO::console_log('Error: Could not run query ...');
      return NULL;
    }

    $connection = NULL;
  }
}
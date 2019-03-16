<?php

class IO {
  public static function console_log($str) {
    echo "<script>";
    echo "console.log('$str')";
    echo "</script>";
  }
}

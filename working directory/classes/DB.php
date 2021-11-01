<?php

class DB
{
  private static $_server = "localhost";
  private static $_dbname = "2102db";
  private static $_username = "root";
  private static $_password = "";

  public static function connection()
  {
    $conn = null;

    if ($conn == null) {
      try {
        $conn = new PDO(
          'mysql:host=' . self::$_server . ';dbname=' . self::$_dbname,
          self::$_username,
          self::$_password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo 'PDO Error: ' . $e->getMessage();
      }
    }
    return $conn;
  }
}
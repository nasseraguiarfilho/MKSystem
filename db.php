<?php

$config = parse_ini_file('C:\xampp\config.ini');
$db = new Db();    
 
// Quote and escape form submitted values
$firstName = $db -> quote($_POST['firstName']);
$lastName = $db -> quote($_POST['lastName']);
$company = $db -> quote($_POST['company']);
 
// Insert the values into the database
$result = $db -> query("INSERT INTO 'customer' ('firstName', 'lastName', 'company') VALUES (" . $name . "," . $email . "," . $company . ")");



class Db {


    protected static $connection;

    public function connect() {
        if (!isset(self::$connection)) {
            $config = parse_ini_file('C:\xampp\config.ini');
            self::$connection = new mysqli('localhost', $config['username'], $config['password'], $config['dbname']);
        }

        if(self::$connection === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
            return false;
        }
        return self::$connection;
    }

      public function query($query) {
          $connection = $this->connect();
            $result = $connection->query($query);
            if($result === false) {
                echo $connection->error;
                return false;
            }
            return $result;
      } 

      public function quote($value) {
            $connection = $this->connect();
            return "'" . $connection->real_escape_string($value) . "'";
      }

      public function close() {
          $connection = $this->connect();
          $connection->close();
      }

      public function error() {
          $connection = $this->connect();
          return $connection->error;
      }

      public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    
}

?>
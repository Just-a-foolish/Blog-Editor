<?php

class Connection{

    function connect(){
        $db_host = "localhost";
        $db_username = "drakah";
        $db_password = "xzpl4ym13k";
        $db_name = "blog";
    
        $conn = new mysqli($db_host,$db_username,$db_password,$db_name);
        if ($conn->connect_error) {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
          }
        return $conn;
    }
    
    function selectFromBD($sql){
        $conn = $this->connect();   
        if (!$result = $conn->query($sql)) {
          echo "Error: " . $sql . "<br>" . $conn->connect_error;
        }
        $conn->close();
        return $result;
    }
    
    function insertIntoDB($sql){
        $conn = $this->connect();
        if (!$conn->query($sql)) {
          echo "Error: " . $sql . "<br>" . $conn->connect_error;
        }
        $conn->close();
    }
    
    function deleteFromDB($sql){
      $conn = $this->connect();
      if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->connect_error;
      }
      $conn->close();
    }
}

?>
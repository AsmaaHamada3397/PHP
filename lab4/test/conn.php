<?php 
include_once("config.php");

try {
  $conn = new mysqli(DB_HOST , DB_USERNAME ,PASSWORD,DB_NAME);
    if ($conn->connect_error){
        die("faild to connect");
    } 
        //echo" connected successfully";

     

    }
catch (Exception){
    echo"error";
}



?>
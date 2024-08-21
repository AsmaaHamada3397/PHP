<?php
 include_once("conn.php");
 $name = "asmaa";
 $username = "asmaa";
 $password = "1234";
 $query = "INSERT INTO students (name, username, password) VALUES (? , ? , ?)";
 $result = $conn-> prepare($query);
 $result ->bind_param("sss", $name , $username , $password);
 if($result ->execute()){
    echo "Student is added into database";
    } else{
    echo "faild to add new student";
   }
?>
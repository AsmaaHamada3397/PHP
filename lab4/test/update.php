<?php
 include_once("conn.php");
 $name = "akram";
 $username = "akram";
 $password = "1234";
 $id = 4;
 $query = "UPDATE students SET name = ? , username = ? , password = ? where id = ? ";
 $result = $conn-> prepare($query);
 $result ->bind_param("sssi", $name , $username , $password, $id);
 if ($result ->execute()){
    echo "Student is Updated";
 } else{
    echo "faild to add new student";
 }
?>
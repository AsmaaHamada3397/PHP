<?php
 include_once("conn.php");
 $id = 4;
 $query = " DELETE from students where id = ? ";
 $result = $conn-> prepare($query);
 $result ->bind_param("i", $id);
 if ($result ->execute()){
    echo "Student is deleted";
 } else{
    echo "faild to add new student";
 }
?>
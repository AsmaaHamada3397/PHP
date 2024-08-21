<?php 
include_once("conn.php");
echo "<h1> Welcome, Students</h1>";

echo " <table border= 1px black>
    <tr>    
    <th> StudentID </th>
    <th> Name </th>
    <th> UserName</th>
    <th> Password </th>
    </tr>
";

$sql = "SELECT * FROM `students`";
$result= $conn->query($sql);
if ($result->num_rows > 0) {
    while($row=$result->fetch_assoc()){
        echo"<tr>";
        echo"<td>". $row["id"]. "</td>";
        echo"<td>". $row["name"]. "</td>";
        echo"<td>". $row["username"]. "</td>";
        echo"<td>". $row["password"]. "</td>";
        echo "</tr>";
    }
}

$conn->close();
?>
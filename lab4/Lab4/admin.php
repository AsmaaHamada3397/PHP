

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <header>
        <?php
         session_start();
         include_once("conn.php");
         echo "<h1>Hello, admin</h1> ";
        ?>
    </header>
    <main>
    <?php

include_once("conn.php");

echo "<h1>Users List:</h1>";

echo "<table border='1' style='border-color: black; width: 100%;'>
    <tr>    
        <th>UserID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Password</th>
        <th>Address</th>
        <th>Country</th>
        <th>Gender</th>
        <th>Department</th>
        <th>Photo</th>
        <th>Photo Path</th>
        <th>Action</th>
    </tr>
";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$users = $result->fetchAll(PDO::FETCH_ASSOC);

if (count($users) > 0) {
    foreach ($users as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["firstName"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["lastName"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["password"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Address"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Country"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Gender"]) . "</td>";   
        echo "<td>" . htmlspecialchars($row["Department"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Photo"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["PhotoPath"]) . "</td>";
        
        // Add Action links
        echo "<td>
            <a href='update.php?id=" . htmlspecialchars($row["id"]) ."'>Edit</a> | 
            <a href='admin.php?id=" . htmlspecialchars($row["id"]) ."'>Delete</a>
        </td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13'>No users found.</td></tr>";
}

echo "</table>";

?>

    </main>
    <footer>
        Thank you for visiting us 
    </footer>
</body>
</html>




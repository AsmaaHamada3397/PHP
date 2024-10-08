<?php
include_once("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Failed to delete the user.";
    }
} else {
    echo "Invalid request.";
}
?>

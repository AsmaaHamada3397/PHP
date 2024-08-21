<?php
include_once("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect form data
        $firstName = $_POST['first'];
        $lastName = $_POST['last'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];

        // Prepare the update query
        $query = "UPDATE users SET firstName = :first, lastName = :last, email = :email, country = :country, gender = :gender WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':first', $firstName);
        $stmt->bindParam(':last', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "User updated successfully!";
        } else {
            echo "Failed to update the user.";
        }
    } else {
        // Fetch the existing user data for the form
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update User</title>
            </head>
            <body>
                <h2>Update User</h2>
                <form method="POST">
                    <label for="first">First Name:</label>
                    <input type="text" id="first" name="first" value="<?php echo htmlspecialchars($user['firstName']); ?>" required />
                    <br><br>
                    <label for="last">Last Name:</label>
                    <input type="text" id="last" name="last" value="<?php echo htmlspecialchars($user['lastName']); ?>" required />
                    <br><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required />
                    <br><br>
                    <label for="country">Country:</label>
                    <select name="country" id="country" required>
                        <option value="Egypt" <?php echo (isset($user['country']) && $user['country'] === 'Egypt') ? 'selected' : ''; ?>>Egypt</option>
                        <option value="UK" <?php echo (isset($user['country']) && $user['country'] === 'UK') ? 'selected' : ''; ?>>United Kingdom</option>
                        <option value="Germany" <?php echo (isset($user['country']) && $user['country'] === 'Germany') ? 'selected' : ''; ?>>Germany</option>
                    </select>
                    <br><br>
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" value="m" <?php echo (isset($user['gender']) && $user['gender'] === 'm') ? 'checked' : ''; ?> required> Male
                    <input type="radio" name="gender" value="f" <?php echo (isset($user['gender']) && $user['gender'] === 'f') ? 'checked' : ''; ?> required> Female
                    <br><br>
                    <input type="submit" value="Update">
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "User not found.";
        }
    }
} else {
    echo "Invalid request.";
}
?>

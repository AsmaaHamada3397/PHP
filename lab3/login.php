<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="validation.php" method="post">
        <label for="username"> Username</label>
        <input type="text" name="username" id="username" required>

        <br>

        <label for="password">Password</label>
        <input type="text" name="password" id="password" required>

        <br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
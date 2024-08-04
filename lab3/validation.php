<?php
session_start();

function validate($username, $password) {
    $filename = 'users.txt';

    if (!file_exists($filename)) {
        die("User file not found.");
    }

    $fileContent = file_get_contents($filename);
    if ($fileContent === false) {
        die("Failed to read user file.");
    }

    $users = explode("\n", $fileContent);

    foreach ($users as $user) {
        if (trim($user) === '') {
            continue;
        }

        list($storedFirstName, $storedLastName, $storedGender, $storedAddress, $storedCountry, $storedUsername, $storedPassword, $storedDept, $storedFile) = explode(',', trim($user));

        if ($username === $storedUsername && $password === $storedPassword) {
            return true;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (validate($username, $password)) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        echo "Invalid username or password";
    }
}
?>

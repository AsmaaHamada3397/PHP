<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  

     <form method="post">
            <label for="username"> Username </label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password</label>
            <input type="password" name="" id="">

            <br>

            <input type="submit" value="Submit">
     </form>
     <?php 
            session_start();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['username'])) { // Check if 'username' is set
                    $username = $_POST['username'];
                
                    if ($username === 'admin') {
                        header('Location: admin.php'); // Replace with your specific page
                        exit(); // Make sure to exit after a redirect to stop further script execution
                    }
                }
            }
        
        ?>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];

    
        if (empty($_POST['fname'])) {
            $errors[] = "First name is required.";
        } else {
            $firstName = htmlspecialchars($_POST['fname']);
        }

    
        if (empty($_POST['lname'])) {
            $errors[] = "Last name is required.";
        } else {
            $lastName = htmlspecialchars($_POST['lname']);
        }

        
        if (empty($_POST['username'])) {
            $errors[] = "Username is required.";
        } else {
            $username = htmlspecialchars($_POST['username']);
        }

    
        if (empty($_POST['password'])) {
            $errors[] = "Password is required.";
        } else {
            $password = $_POST['password'];
            $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if (!preg_match($passwordPattern, $password)) {
                $errors[] = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
            }
        }


        if (empty($errors)) {
        
            $address = htmlspecialchars($_POST['address']);
            $gender = htmlspecialchars($_POST['gender']);
            $dept = htmlspecialchars($_POST['dept']);

            echo "<p>Thanks " . ($gender == 'm' ? 'Mr.' : 'Mrs.') . " " . $firstName . " " . $lastName . "</p>";
            echo "<p>Please Review Your Information :</p>";

            echo "<p>Name: " . $firstName . " " . $lastName . "</p>";
            echo "<p>Address: " . $address . "</p>";

            if (isset($_POST['skills']) && is_array($_POST['skills'])) {
                $skills = $_POST['skills'];
                $skillsString = implode(", ", array_map('htmlspecialchars', $skills));

                echo "<p>Your Skills: " . $skillsString . "</p>";
            } else {
                echo "<p>No skills selected.</p>";
            }
            echo "<p>Department: " . $dept . "</p>";
        } else {
            foreach ($errors as $error) {
                echo "<p style='color:maroon;'>" . htmlspecialchars($error) . "</p>";
            }
            echo "<p><a href='registration.php'>Go back to the registration form</a></p>";
        }
    } else {
        echo "Form not submitted.";
    }

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['country'])&& isset($_POST['gender']) && isset($_POST['dept']) )
    {
        $resource=fopen('users.txt','a');
        if(is_resource($resource))
        {
            fwrite($resource,
            $_POST['fname'].','. $_POST['lname'].','. $_POST['gender'].','. $_POST['address'].','. $_POST['country'].',' . $_POST['username'].','.$_POST['password'].','. $_POST['dept']."\n");
            fclose($resource);
        }
        else
        {echo 'invalid filename';}
    }
    ?>
</body>
</html>

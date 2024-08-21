<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registration Form</title>
    </head>

    <body>
        <div class="main">
            <h2>Registration Form</h2>
            <form method="POST">
                <label for="first">First Name:</label>
                <input type="text" id="first" name="first" required />
                <br><br>
                <label for="last">Last Name:</label>
                <input type="text" id="last" name="last" required />
                <br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />
                <br><br>
                <label for="address">Address</label>
                <textarea name="address" id="address"></textarea>
                <br><br>
                <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value=" " disabled selected > Select Country </option>
                        <option value="Egypt">Egypt</option>
                        <option value="uk"> united Kingdom</option>
                        <option value="germany">Germany</option>
                    </select>
                <br><br>
                <label for="gender">Gender</label>
                
                <input type="radio" name="gender" id="gender" value="m">
                <label for="male">Male</label>

                <input type="radio" name="gender" id="gender" value="f">
                <label for="male">Female</label>     
                
                <br><br>
                <label for="skills">Skills</label>

                <input type="checkbox" name="skills[]" id="php" value ="PHP">
                <label for="php">PHP</label>
                        
                <input type="checkbox" name="skills[]" id="j2se" value = "J2SE">
                <label for="j2se">J2SE</label>
                
                <input type="checkbox" name="skills[]" id="mysql" value = "MySQL">
                <label for="checkbox">MySQL</label>
                <input type="checkbox" name="skills[]" id="postgree" value = "PostgreeSQL">
                <label for="checkbox">PostgreeSQL</label>

                <br><br>

                <label for="dept">Department</label>
                <input type="text" name="dept" id="dept" value="OpenSource">
                
                <br><br>

                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <label for="userfile">Upload a file: </label>
                <input type="file" name="userfile" id="userfile">
                
                <br><br>
                
                <div>
                    <p>Please Insert the code the below box</p>
                </div>
                <div>
                    <p>Sh68Sa</p>
                    <input type="text" name="patcha" id="patcha">
                </div>
                    
                <br><br>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset"> 
            </form>
        </div>

        <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include_once("conn.php");

            $firstName = $_POST['first'];
            $lastName = $_POST['last'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];
            $department = $_POST['dept'];
            $skills = isset($_POST['skills']) ? implode('-', $_POST['skills']) : '';

            //photo
            $photopath = '';
            if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                $targetDirectory = "uploads/";
                $filename = uniqid() . "_" . basename($_FILES["userfile"]["name"]);
                $targetFile = $targetDirectory . $filename;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $targetFile)) {
                        $photopath = $targetFile;
                    } else {
                        echo "Failed to upload the file.";
                    }
                } else {
                    echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                }
            }
            // Prepare the SQL query
            $query = "INSERT INTO users (firstName, lastName, email, password, address, country, gender, department, photopath) VALUES (:first, :last, :email, :password, :address, :country, :gender, :department, :photopath)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':first', $firstName);
            $stmt->bindParam(':last', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':department', $department);
            $stmt->bindParam(':photopath', $photopath);
            if ($stmt->execute()) {
                echo "User is added into the database. User ID = " . $conn->lastInsertId();
            } else {
                echo "Failed to add new user.";
            }
        }
        ?>

    </body>
</html
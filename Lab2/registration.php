<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<style>
    .container{
        text-align: center;
    }
    .container1{
        display: flex;
        margin-top: 5px;
    }
    label{ 
        padding-right:10px;
    }
    input{
        padding-left: 10px
    }

    .container2{
        display:flex;
    }
</style>
<body>
<h1> Register Now!</h1>
    <div class="container">
        <form action="done.php" method="post">
            <div class="container1">
                <div>
                    <label for="fname">First Name</label>
                </div>
                <div>
                    <input type="text" name="fname" id="fName">
                </div>
            </div>
            <div class="container1">
                <div>
                    <label for="lname">Last Name</label>
                </div>
                <div>
                    <input type="text" name="lname" id="lName">
                </div>
            </div>
            <div class="container1">
                <div>
                    <label for="address">Address</label>
                </div>
                <div>
                    <textarea name="address" id="address"></textarea>
                </div>
            </div>
            <div class="container1">
                <div>
                    <label for="country">Country</label>
                </div>
                <div>
                    <select name="country" id="country">
                        <option value=" " disabled selected > Select Country </option>
                        <option value="Egypt">Egypt</option>
                        <option value="uk"> united Kingdom</option>
                        <option value="germany">Germany</option>
                    </select>
                </div>
            </div>
            <div class="container1">
                <div> 
                  <label for="gender">Gender</label>
                </div>
                <div>
                    <input type="radio" name="gender" id="gender" value="m">
                    <label for="male">Male</label>

                    <input type="radio" name="gender" id="gender" value="f">
                    <label for="male">Female</label>                    
                </div>
            </div>
            <div class="container1">
                <div>
                    <label for="skills">Skills</label>
                </div>
                <div>
                    <input type="checkbox" name="skills[]" id="php" value ="PHP">
                    <label for="php">PHP</label>
                      
                    <input type="checkbox" name="skills[]" id="j2se" value = "J2SE">
                    <label for="j2se">J2SE</label>
                    <br>
                    <input type="checkbox" name="skills[]" id="mysql" value = "MySQL">
                    <label for="checkbox">MySQL</label>
                    <input type="checkbox" name="skills[]" id="postgree" value = "PostgreeSQL">
                    <label for="checkbox">PostgreeSQL</label>
                </div>
            </div>
            <div class="container1">
                <div>
                    <label for="username">Username</label>
                </div>
                <div>
                    <input type="text" name="username" id="username">
                </div>
            </div>
            <div class="container1">
                <div>
                 <label for="password">Password</label>
                </div>
                <div>
                    <input type="password" name="password" id="password">
                </div>
            </div>
            <div class="container1">
                <div>
                 <label for="dept">Department</label>
                </div>
                <div> 
                    <input type="text" name="dept" id="dept" value="OpenSource">
                </div>
            </div>
            <div class="container1">
                <div class="container2">
                    <div>
                        <p>Sh68Sa</p>
                        <input type="text" name="patcha" id="patcha">
                    </div>
                    <div>
                        <p>Please Insert the code the below box</p>
                    </div>
                </div>
            </div>  
            <div class="container1">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset"> 
            </div>
        </form>
    </div>

</body>
</html>
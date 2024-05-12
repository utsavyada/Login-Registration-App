    <?php
    $showAlert=false;
    $showError=false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'dbconnection.php';

        $name=$_POST["name"];
        $salary=$_POST["sal"];   
        $desg=$_POST["desg"];
        $uname=$_POST["uname"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];

        $existSql="SELECT * FROM `employee` WHERE username='$uname'";
        $result=mysqli_query($conn,$existSql);
        $numExistRows= mysqli_num_rows($result);
        if($numExistRows > 0){
                $showError ="Username Already Exists";
            }
        else{
            if(($password == $cpassword)){
                $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `employee` (`name`, `salary`, `designation`, `username`, `password`) VALUES ('$name', '$salary', '$desg', '$uname', '$hash')";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showAlert= true;
            }
            }
            else{
                $showError="Password do not match";
            }
            }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Page</title>
        <link rel="stylesheet" type="text/css" href="externalcss.css">

    </head>
    <body>
    <?php
        if($showAlert == true){
        echo '<div class="alert">
        <strong>Success!</strong> Your account is created now you can login.
        </div>';
        
        }

        if($showError == true){
            echo '<div class="error">
            <strong>Error!</strong>'.$showError.'
        </div>';
        }
    ?>
    <h2>Registration Form</h2>
    <div class="formbox">
    <form action="register.php" method="post">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your Full Name" required/>
        <br><br>
        <label>Salary</label>
        <input type="number" name="sal" placeholder="Enter your Salary" required/>
        <br><br>
        <label>Designation</label>
        <input type="text" name="desg" placeholder="Enter your Designation" required/>
        <br><br>
        <label>Username</label>
        <input type="text" maxlength="15" name="uname" placeholder="Enter your Username" required/>
        <br><br>
        <label>Password</label>
        <input type="password" name="password"  maxlength="15"  placeholder="Enter your Password"  required/>
        <br><br>
        <label> Confirm Password</label>
        <input type="password" name="cpassword" placeholder="Confirm  your Password" required/>
        <br><br>
        <button type="submit">Register</button>
    </form>
    </div>
    <h3><a href="login.php">Click here to Login</a></h3>
    </body>
    </html>
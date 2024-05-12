<?php
$login =false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnection2.php';
    $uname=$_POST["uname"];
    $password=$_POST["password"];
         $sql="SELECT * FROM `emp` WHERE username='$uname'";
          $result=mysqli_query($conn,$sql);
          $num=mysqli_num_rows($result);
          if($num ==1){
          while($row=mysqli_fetch_assoc($result)){
          if(password_verify($password,$row['password'])){
            $login=true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['uname']=$uname;
          header("location:/utsav/modification/home2.php");
          exit;
          }
         else{
            header("Location:/utsav/modification/login2.php?error=Invalid Credentials");
            exit;
         }
      }  
      }
     else{
      header("Location:/utsav/modification/login2.php?error=Invalid Credentials");
      exit;       }
    }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="external2.css">

  </head>
  <body>
    <?php
      if($login == true){
        header("Location:/utsav/modification/home2.php?success=you logged successfully");
        exit;
      }
    ?>
     <h2>LOGIN </h2>
    <div class="formbox">
        <form method="post" >
        <label>Username</label>
        <input type="text" name="uname" placeholder="Enter your Username" required/><br>
        <label>Password</label>
        <input type="text" name="password" placeholder="Enter your Password"required/><br>
        <!-- <button type="submit">Login</button> -->
        <input type="submit" value="Login">
    </form>
      </div>
  </body>
  </html>
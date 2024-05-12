  <?php
  $login= false;
  $showError= false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnection.php';
    $uname=$_POST["uname"];
    $password=$_POST["password"];
         $sql="SELECT * FROM employee WHERE username='$uname'";

    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num ==1){
      while($row=mysqli_fetch_assoc($result)){
     
        if(password_verify($password,$row['password'])){
          $login= true;
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['uname']=$uname;
          header("location: home.php");
        }
        else{
          $showError="Invalid Credentials";
         }
      }
     
       
      }
  else{
        $showError="Invalid Credentials";
       }
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="externalcss.css">

  </head>
  <body>
    <?php
      if($login == true){
        echo '<div class="alert">
        <strong>Success!</strong> You logged in Successfully.'.
        '</div>';
      }

      if($showError == true){
        echo '<div class="error">
        <strong>Error!</strong>'.$showError.'
    </div>';
        }

    ?>
     <h2>LOGIN </h2>
    <div class="formbox">
        <form action="login.php" method="post" >
        <label>Username</label>
        <input type="text" name="uname" placeholder="Enter your Username" required/>
        <br><br>
        <label>Password</label>
        <input type="text" name="password" placeholder="Enter your Password"required/>
        <br><br>
        <button type="submit">Login</button>
    </form>
      </div>
  </body>
  </html>
    <?php
    session_start();
    if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin']!= true){
        header("location: login.php");
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home Page</title>
            <link rel="stylesheet" type="text/css" href="externalcss.css">
    </head>
    <body>
        <h2>Welcome- <?php  echo $_SESSION["uname"]."!";?></h2>
        <p> Welcome to Employee Management System </p>
        <p>Whenever you need to, be sure to log out <a href="logout.php">using this LINK</a></p>
    </body>
    </html>
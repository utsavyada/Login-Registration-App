<?php
    //  session_start();
    // if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin']!= true){
    //  header("location:/utsav/final/login.php");
    //      exit;
    //  }
 ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
            <meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Home Page</title>
       <link rel="stylesheet" type="text/css" href="external3.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
      $(document).ready(function(){
           $('#display-btn').click(function(){
                $.ajax({
                  url:'http://localhost/utsav/final/display.php',
                  type:'GET',
                    dataType:'json',
                   success:function(data){
                      var html='';
                       for(var i=0;i<data.length;i++){
                           html += '<p>Empid: '+data[i].empid +'</p>';
                          html += '<p>Name: '+data[i].name +'</p>';
                          html += '<p>Salary: '+data[i].salary +'</p>';
                           html += '<p>Designation: '+data[i].designation +'</p>';
                           html += '<p>Username: '+data[i].username +'</p>'; 
                           html += '<p>Password '+data[i].password +'</p>';
                       }
                      $('#display-container').html(html);
                   },
                   error: function(jqXHR, textStatus, errorThrown){
                       console.log(textStatus, errorThrown);
                  }
                });
         });
        });
      </script>
    </head>
<body>
       <!-- <h2>Welcome- <?php echo $_SESSION["uname"]."!";?></h2> -->
       <p> Welcome to Modified Employee Management System </p>
      <p>Whenever you need to, be sure to log out <a href="logout.php">using this LINK</a></p>
        <button id="display-btn">Display Data</button>
       <div id="display-container"></div>
    </body>
   </html>
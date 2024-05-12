<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Page</title>
        <link rel="stylesheet" type="text/css" href="external3.css">

    </head>
    <body>
    <h2>Registration Form</h2>
    <form action="validation.php" method="post">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your Full Name" />
        <br><br>
        <label>Salary</label>
        <input type="number" name="sal" placeholder="Enter your Salary" />
        <br><br>
        <label>Designation</label>
        <input type="text" name="desg" placeholder="Enter your Designation"/>
        <br><br>
        <label>Username</label>
        <input type="text" maxlength="15" name="uname" placeholder="Enter your Username" />
        <br><br>
        <label>Password</label>
        <input type="password" name="password"   placeholder="Enter your Password" />
        <br><br>
        <label> Confirm Password</label>
        <input type="password" name="cpassword" placeholder="Confirm  your Password" />
        <br><br>
        <button type="submit">Register</button>
    </form>
    <h3><a href="login.php">Click here to Login</a></h3>
    </body>
    </html>
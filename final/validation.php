<?php
session_start();
include"dbconnection.php";
if(isset($_POST['name']) && isset($_POST['sal']) && isset($_POST['desg']) && isset($_POST['uname'])   && isset($_POST['password']) && isset($_POST['cpassword']))
{
     function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        $name= Validate ($_POST['name']);
        $salary= Validate ($_POST['sal']);
        $desg= Validate ($_POST['desg']);
        $uname=Validate ($_POST['uname']);
        $password=Validate ($_POST['password']);
        $cpassword=Validate ($_POST['cpassword']);

        if(empty($uname)){
                header("Location: /utsav/final/register.php?error=Please Enter Username");
                exit;
        }    
        else if(empty($password)){
                    header("Location:/utsav/final/register.php?error=Please Enter Password");
                    exit;
            }
        else if(empty($cpassword)){
                header("Location: /utsav/final/register.php?error=Please Confirm your passwod");
                exit;
            }
        else if(empty($name)){
                header("Location: /utsav/final/register.php?error=Please Enter name");
            exit;
            }
        else if(empty($salary)){
                header("Location:/utsav/final/register.php?error=Please Enter salary");
            exit;
            }
        else if(empty($desg)){
                header("Location: /utsav/final/register.php?error=Please Enter designation");
            exit;
            }
        else if($password != $cpassword){
                header("Location: /utsav/final/register.php?error=password do not match");
            exit;
            }
        else{
                $existSql="SELECT * FROM `employee2` WHERE username='$uname'";
                $result=mysqli_query($conn,$existSql);
                $numExistRows= mysqli_num_rows($result);
                if($numExistRows > 0){
                    header("Location: /utsav/final/register.php?error=The username is already exists");
                    exit;
                    }
                else{
                        if(($password == $cpassword)){
                            $hash=password_hash($password, PASSWORD_DEFAULT);
                        $sql="INSERT INTO `employee2` (`name`, `salary`, `designation`, `username`, `password`) VALUES ('$name', '$salary', '$desg', '$uname', '$hash')";
                        $result=mysqli_query($conn,$sql);
                            if($result){
                                header("Location:/utsav/final/register.php?success=Your account has been created successfully");
                                exit;
                            }
                        }
                        else{
                                header("Location:/utsav/final/register.php?error=Unknown error occurred");
                            exit;
                        }
                    }
            }
}
else {
    header("Location: /utsav/final/register.php?error=Incorrect user name or password");
    exit;
}
<?php

error_reporting(0);
session_start();

$host="localhost";

$user="root";

$password="";

$db="student_info_system";

$data = mysqli_connect($host, $user, $password, $db);

if($data === false){
    die("connection error");
}
     if($_SERVER["REQUEST_METHOD"]=="POST")
     {
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $sql="select * from user where username = '".$name."' AND password = '".$pass."'  ";

        $result = mysqli_query($data, $sql);

        $row = mysqli_fetch_array($result);

        if($row["usertype"] == "student"){
            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = "student";

            header("location: student_home.php");
        }elseif($row["usertype"] == "admin"){
            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = "admin";

            header("location: admin_home.php");
        }else{
           
            $message =  "username or password does not match";
            $_SESSION['loginMessage'] = $message;
            header("location:login.php");
        }
     }
     

?>
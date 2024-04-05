<?php

session_start();

$host="localhost";

$user="root";

$password="";

$db="student_info_system";

$data = mysqli_connect($host, $user, $password, $db);
if($data === false){
    die("connection error");
}

if(isset($_POST['apply'])){
    $data_name = $_POST['name'];
    $data_age = $_POST['age'];
    $data_roll = $_POST['roll'];
    $data_contact = $_POST['contact'];
    $data_branch = $_POST['branch'];
    $data_address = $_POST['address'];

    $sql="INSERT INTO student_admission(name, age, roll, contact, branch, address) VALUES ('$data_name', '$data_age', '$data_roll', '$data_contact', '$data_branch', '$data_address')";
    
    $result= mysqli_query($data, $sql);

    if($result){
        $_SESSION['message'] = "your application was sent successfully";
        header("location: index.php");
    }else{
        echo "Apply Failed";
    }
}

?>
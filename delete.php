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

  if($_GET['student_id']){
    $user_id = $_GET['student_id'];
    $sql = "DELETE FROM user WHERE id='$user_id'";
    $result = mysqli_query($data, $sql);
    if($result){
       $_SESSION['message'] = "Delete student is successful";
       header("location: view_student.php");
    }

  }

  
  

?>
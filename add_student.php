<?php
session_start();

  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
  elseif(($_SESSION['usertype'])== "student"){
    header("location: login.php");
  }

  $host="localhost";

  $user="root";

  $password="";

  $db="student_info_system";

  $data = mysqli_connect($host, $user, $password, $db);
  
  if(isset($_POST['add_student'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype='student';

    $check = "SELECT * FROM user WHERE username='$username'";
    $check_user=mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if($row_count==1){
        echo "<script type='text/javascript'>
                  alert('username already exists, try another!');
                  </script>";
    }
    else{
        $sql="INSERT INTO user(username, usertype, password) VALUES ('$username', '$usertype', '$password')";
        $result= mysqli_query($data, $sql);

        if($result){
            echo "<script type='text/javascript'>
                  alert('Data upload success');
                  </script>";
        }else{
            echo "Data Upload Failed";
        }
    }
}


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Student</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="admin.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <?php

             include 'admin_sidebar.php';
        ?>
        <div class="content">
           <center>
              <h1>Add Student</h1>
              <br>
              <div class="div_deg">
                  <form action="#" method="post">
                     <div class="adm_int1">
                        <label class="label_text1">Name</label>
                        <input class="input_deg1" type="text" name="username">
                     </div>
                    
                     <div class="adm_int1">
                        <label class="label_text1">Password</label>
                        <input class="input_txt1" name="password" type="password"></input>
                     </div>
                     <div class="adm_int1">
                              <input type="Submit" id="submit" class="btn btn-primary" value="Add student" name="add_student">
                     </div>
                   </form>
              </div>
           </center>
            
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
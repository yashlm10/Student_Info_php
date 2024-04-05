<?php
  error_reporting(0);
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
  if($data === false){
      die("connection error");
  }

  $sql = "SELECT * FROM user WHERE usertype='student'";
  $result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>View Student</title>
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
            <h1>Student Data</h1>
            <?php
              if($_SESSION['message']){
                 echo $_SESSION['message'];
              }
              unset($_SESSION['message']);
            
            ?>
            <br><br>
            <table class="table table-striped">
               <thead>
                 <tr>
                   <th scope="col">Username</th>
                   <th scope="col">Password</th>
                   <th scope="col">Delete</th>
                   <th scope="col">Update</th>
                  
                 </tr>
               </thead>
               <tbody>
                 <?php
                   while($info = $result->fetch_assoc()){
                 ?>
                 <tr>
                  <td>
                    <?php  echo "{$info['username']}";?>
                  </td>
                  <td>
                    <?php  echo "{$info['password']}";?>
                  </td>
                  <td>
                    <?php  echo "<a  class='btn btn-danger' onClick =\" javascript:return confirm('Are you sure to delete this');\"
                    href='delete.php?student_id={$info['id']}'>Delete</a>";?>
                  </td>
                  <td>
                    <?php  echo "<a class='btn btn-warning'
                    href='update_student.php?student_id={$info['id']}'>Update</a>";?>
                  </td>
                 </tr>
                 <?php
                   }
                 ?>
                </tbody>
            </table>
            </center>

        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
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

  $sql="SELECT * FROM student_admission";
  $result=mysqli_query($data, $sql);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admission</title>
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
            <h1> Applied for Admission</h1>
            <br>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Roll</th>
                  <th scope="col">Branch</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Address</th>
                </tr>
              </thead>
              <tbody>

              <?php
                while($info = $result->fetch_assoc()){
              ?>
                <tr>
                  <td>
                    <?php  echo "{$info['name']}";?>
                  </th>
                  <td>
                    <?php  echo "{$info['age']}";?>
                  </th>
                  <td>
                    <?php  echo "{$info['roll']}";?>
                  </th>
                  <td>
                    <?php  echo "{$info['branch']}";?>
                  </th>
                  <td>
                    <?php  echo "{$info['contact']}";?>
                  </th>
                  <td>
                    <?php  echo "{$info['address']}";?>
                  </th>
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
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
  if(isset($_POST['add_teacher'])){
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql = "INSERT INTO teacher_data(name,description,image) VALUES('$t_name', '$t_description', '$dst_db')";
    $result = mysqli_query($data, $sql);
    if($result){
        header("location:add_teacher.php");
    }
  }


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Teacher</title>
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
              <h1>Add Teacher</h1>
              <br><br>
              <div class="div_deg">
                  <form action="#" method="post" enctype="multipart/form-data">
                     <div class="adm_int1">
                        <label class="label_text1">Name</label>
                        <input class="input_deg1" type="text" name="name">
                     </div>
                    
                     <div class="adm_int1">
                        <label class="label_text1">Description</label>
                        <textarea class="input_txt1" name="description" type="description"></textarea>
                     </div>
                     <div class="adm_int1">
                        <input class="input_deg1" type="file" name="image">
                     </div>
                     <br>
                     <div class="adm_int1">
                              <input type="Submit" id="submit" class="btn btn-primary" value="Add teacher" name="add_teacher">
                     </div>
                   </form>
              </div>
           </center>
            
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
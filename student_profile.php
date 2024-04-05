<?php
session_start();

  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }elseif(($_SESSION['usertype'])== "admin"){
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
  $name = $_SESSION['username'];
  $sql = "SELECT * FROM user WHERE username='$name'";
  $result = mysqli_query($data, $sql);
  $info = mysqli_fetch_assoc($result);

  if(isset($_POST['update_profile'])){
    
    $password = $_POST['password'];

    $sql = "UPDATE user SET password='$password' WHERE username='$name'";
    $result2 = mysqli_query($data, $sql);
    if($result2){
        header("location:student_profile.php");
    }
  }

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Profile</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <?php
          include 'student_sidebar.php';
        ?>
         <center>
          <div class="content">
            <h1>Student Data Update</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    
                    <div class="adm_int1">
                        <label class="label_text1">Password</label>
                        <input type="text" name="password" class="input_deg1" value="<?php  echo "{$info['password']}";?>">
                    </div>
                    <div class="adm_int1">
                       <button class="btn btn-secondary" value="Update" name="update_profile">Update</button>
                    </div>
                </form>
            </div>
          </div>
        </center>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<?php
session_start();

  if(!isset($_SESSION['username'])){
    header("location: login.php");
  }elseif(($_SESSION['usertype'])== "admin"){
    header("location: login.php");
  }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Home</title>
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
            <h1>Student PAGE</h1>
            <br><br>
            <p>The campus of NIT DURGAPUR spans 187 acres (0.75 km2).[9] [15] The main entrance is located on the eastern end of the campus, facing Mahatma Gandhi Road. The institute's academic facilities are located in the eastern half of the campus; these include the department buildings, laboratories and workshops, lecture halls, computer centres, and the central library.[16] The campus has separate buildings for the departments of Computer Science Engineering, Electronics and Communication Engineering, management, Chemistry, Biotechnology. Each department has its own library, in addition to the central library, which holds more than one lakh resources including books, periodicals, and journals in print and electronic format.</p>
            <img src="https://iiab.me/kiwix/wikipedia_en_all_maxi_2022-05/I/NIT_Durgapur_Logo.svg.png.webp" alt="logo_nitdgp" >
          </div>
        </center>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
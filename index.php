<?php
   error_reporting(0);
   session_start();
   session_destroy();

   if($_SESSION['message']){
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
             alert('$message')
          </script>";
   }
  $host="localhost";

  $user="root";

  $password="";

  $db="student_info_system";

  $data = mysqli_connect($host, $user, $password, $db);
  $sql = "SELECT * FROM teacher_data";
  $result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Information System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <nav>
            <label class="logo">NITDGP</label>
            <ul class="mt-3">
                <li><a href="#hero">Home</a></li>
                <li><a href="#adm_form">Admission</a></li>
                <li><a href="login.php" class="btn btn-info">LOGIN</a></li>
                
            </ul>
        </nav>

        <div class="section1" id="hero">
            <label class="img_text">Student Information System</label>
            <img src="https://nitdgp.ac.in/iicpage/static/media/NitFrontGate.ac06eab6.webp" alt="NitDGP" class="main_img">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                     <img src="https://nitdgp.ac.in/uploads/academic2.jpg" alt="mab_nitdgp" class="welcome_img">
                </div>
                <div class="col-md-8">
                     <h1>Welcome to NITDGP</h1>
                     <p>National Institute of Technology Durgapur (also known as NIT Durgapur or NITDGP), formerly known as Regional Engineering College, Durgapur (also known as REC Durgapur or RECDGP), is a public technical university in the city of Durgapur in West Bengal, India. Founded in 1960,[1][2] it is one of India's oldest technical universities. It is located on a campus of 187 acres (0.75 km²).NIT Durgapur offers undergraduate and postgraduate programs in disciplines spanning engineering, science, architecture and management. The institute has 14 departments with about 224[6] faculty members and more than 4,000 enrolled students.NIT Durgapur was ranked 43rd among engineering colleges in India by the National Institutional Ranking Framework (NIRF) in 2023.</p>
                </div>
            </div>
        </div>
        <br>
        <center class="center1">
            <h1>Our Teachers</h1>
        </center>
        <div class="container">
            <div class="row">

                <?php
                   while($info=$result->fetch_assoc()){
                ?>
                 <div class="col-md-4">
                    <img src="<?php echo "{$info['image']}"?>" alt="<?php echo "{$info['name']}"?>" class="teacher">
                    <h5 class="teacher_text"><?php echo "{$info['name']}"?></h5>
                    <p class="teacher_text"><?php echo "{$info['description']}"?></p>
                 </div>
                <?php
                   }
                ?>
                
               
            </div>
        </div>

        <center class="center1">
            <h1>Our Departments</h1>
        </center>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="data:image/jpeg;base64,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" alt="CSE Department" class="teacher">
                    <h5 class="teacher_text">CSE Department</h5>
                    <p class="teacher_text">The Department started imparting instructions with the most modern curricula and syllabus to the students ofr undergraduate course since 1991 and post graduate course since July, 2004. The Department maintains an excellent teaching/learning and research environment with dedicated, qualified and dynamic faculties and well equiped laboratories.</p>
                </div>
                <div class="col-md-4">
                    <img src="https://ddelabs.in/wp-content/uploads/2022/03/IMG-20220307-WA0002.jpg" alt="BioTechnology Dept" class="teacher">
                    <h5 class="teacher_text">BioTechnology Dept</h5>
                    <p class="teacher_text">The Department of Biotechnology, NIT Durgapur was established in 2005 with the B. Tech Biotechnology Program. The M.Tech program was subsequently introduced in 2009. In the year 2020, the department introduced a MSc in Life Sciences program .</p>
                </div>
                <div class="col-md-4">
                    <img src="https://nitdgp.ac.in/uploads/acadimg/assets/images/infra/img8.jpeg" alt="Electronics Department" class="teacher">
                    <h5 class="teacher_text">Electronics Department.</h5>
                    <p class="teacher_text">The embryonic formation of the Department of Electronics and Communication Engineering was in the year 1983 with the introduction of an undergraduate course. Situated amidst lush green campus with teak plantations, the Department, over the time, has grown in several dimensions and provides a magnetic ambience in teaching and learning.</p>
                </div>
               
            </div>
        </div>


        <center class="center">
            <h1>Admission Form</h1>
        </center>
        <div class="admission_form" id="adm_form" align="center">
             <form action="data_check.php" method="post">
               <div class="adm_int">
                  <label class="label_text">Name</label>
                  <input class="input_deg" type="text" name="name">
               </div>
               <div class="adm_int">
                  <label class="label_text">Age</label>
                  <input class="input_deg" type="text" name="age">
               </div>
               <div class="adm_int">
                  <label class="label_text">Roll</label>
                  <input class="input_deg" type="text" name="roll">
               </div>
               <div class="adm_int">
                  <label class="label_text">Branch</label>
                  <input class="input_deg" type="text" name="branch">
               </div>
               <div class="adm_int">
                  <label class="label_text">Contact</label>
                  <input class="input_deg" type="text" name="contact">
               </div>
               <div class="adm_int">
                  <label class="label_text">Address</label>
                  <textarea class="input_txt" name="address"></textarea>
               </div>
               <div class="adm_int">
                  <input type="Submit" id="submit" class="btn btn-primary" value="Apply" name="apply">
               </div>
             </form>
        </div>

        <footer>
            <h5 class="footer_text">Made with love by @Hiya_Aidasani || All rights to her reserved by Yashvardhan Singh.</h3>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<?php
  
  error_reporting(0);
  session_start();
  session_destroy();

  if($_SESSION['message'])
  {
          $message=$_SESSION['message'];

          echo "<script type='text/javascript'> 
          
          alert('$message');
          
          </script>";
  }

  $host="localhost";
  $user="root";
  $password="";
  $db="schoolproject";
  
  $data=mysqli_connect($host,$user,$password,$db);
  $sql="SELECT * FROM teacher";
  $result=mysqli_query($data,$sql);


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> School Management System </title>
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
<nav>
            <label class="school_name"> Rainbow School</label>
    
            <ul>
                <li><a href="#"> Home </a> </li>
                <li><a href="#"> Contact</a> </li>
                <li><a href="#"> Admission</a> </li>
                <li><a href="login.php" class="btn btn-success"> Login </a> </li>
            </ul>
           </nav>
    
           <div class="section1">
            <label class="img_text">
                We teach with care vhggfvjhhjgjhgjhgjhgjhghgkhghjgjgjgjgkgjgjg
             </label>
                <img class="" src="">
           </div>
    
           <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="welcome_img" src="mainImg.jpg">
                </div>
    
                <div class="col-md-8">
                    <h1><span>  Welcome to Rainbow School </span></h1>
    
                    <p> We concentrate on overall development of our children and provide heathy and interesting environment for their growth. </p>
                
                </div>
            </div>
          </div>
    
          <center>


            <h1> <br> <b> <u> Our Teachers </b> </u> </br></h1>
            <div class="container">
            <div class="row">
            
               <?php 
                while($info=$result->fetch_assoc())
                 {
               ?>
               
    
                <div class="col-md-4">
                    <img class="teacher" src="<?php echo"{$info['image']}" ?>">
                    <h3><?php echo"{$info['name']}" ?></h3>
                    <h5><?php echo"{$info['description']}" ?></h5>
                   
                </div>
              <?php
                 }
              ?>
            </div>
          </div>
    
          </center>


          <center>
            <h1> <br> <b> <u> Our Courses </b> </u> </br> </h1>
            <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="teacher"  src="C1.jpg">
                    <p> Digital Art </p>
                    <p>Expand your creativity with new tools. </p>
                </div>
    
                <div class="col-md-4">
                    <img class="teacher" src="C2.jpg"> 
                    <p> Music Courses </p>
                    <p>Refresh your soul with music and add skills to yourself.</p>
                    
                </div>
    
                <div class="col-md-4">
                    <img class="teacher" src="C3.jpg">
                    <p> Self Defence Course </p>
                    <p>Learn self defence techneques and build your strong personality.</p>
                </div>
    
            </div>
          </div>
    
          </center>

          <center>
             <h1 class="adm"> <br> <b> <u>Admission Form</u></b> </br></h1>
          </center>

          <div align="center" class="admission_form">
            <form action="data_check.php" method="POST">
                <div class"adm_info">
                    <label class="label_text">NAME </label>
                    <input class="input_des" type="text" name="name">
                </div>
                <div  class"adm_info">
                    <label class="label_text"> EMAIL</label>
                    <input class="input_des"type="text" name="email">
                </div>
                <div  class"adm_info">
                    <label class="label_text">PHONE </label>
                    <input class="input_des" type="text" name="phone">
                </div>
                <div  class"adm_info">
                    <label class="label_text" >MESSAGE </label>
                    <textarea class="input_txt" name="message"></textarea>
                </div>
                <div  class"adm_info">
                  
                    <input class="btn btn-primary" id="submit" name="apply" type="submit" value="Apply">
                </div>
            </form>
          </div>

          <footer class="footer_txt">
               <h3> By Samiksha More </h3>
          </footer>
</body>
</html>
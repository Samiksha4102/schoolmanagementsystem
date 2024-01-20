<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

elseif($_SESSION['usertype']=='student')
{
         header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="student";

    $check="SELECT * FROM user WHERE username='$username'";
    
    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count==1)
    {
        echo"<script type='text/javascript'> alert ('Username already exist.Try another one.');
        </script";
    }

    else
    {
      $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES('$username','$user_email','$user_phone','$usertype','$user_password')";
    

$result=mysqli_query($data,$sql);

if($result)
{
   
   echo"<script type='text/javascript'> alert ('Data uploaded successfully');
   </script";

  }

else
{
    echo"Data uploading failed.";
}
}
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Add Student </title>

    <?php
    include 'admin_css.php';

    ?>

    <style type="text/css">

        label{
            display: inline-block:
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        
        .div_deg
        {
            background-color:skyblue;
            width:400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        </style>

</head>
<body>
 <header class="header">
     <a href="">ADMIN DASHBOARD</a>
       <div class="logout">
        <a href="logout.php" class="btn btn-primary">Logout</a>
       </div>
</header>

<?php
 
 include 'admin_sidebar.php';

 ?>

    <div class="admin_content">
        <CENTER>
        <h1><b> <u> Add Students </u></b></h1>
<div class="div_deg">
<form action="#" method="POST" >
    <div>
        <label > Username</label>
        <input type="text" name="name">
    </div>
    <div>
        <label > Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label >Phone</label>
        <input type="number" name="phone">
    </div>
    <div>
        <label > Password</label>
        <input type="text" name="password">
    </div>
    <div>
       
        <input type="submit" class="btn btn-primary"name="add_student" value="Add Student">
    </div>

    </CENTER>
</form>
</div>
</div>
</body>
</html>
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


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Admin Dashboard </title>
    <?php
    include 'admin_css.php';
    
    ?>

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
        <h1> Admin Dashboard </h1>
        <p>jhgdashdfjkshDFKJWDHCJKHDSKJCNKJDsnciuwehf </p>
    

    </div>


</body>
</html>
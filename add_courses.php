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

$sql="SELECT * from admission";

$result=mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Add Student </title>

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
        <CENTER>
        <h1><b> <u> Add Courses </u></b></h1>
</div>


</body>
</html>
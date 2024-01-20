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
        <CENTER>
        <h1> <u> <b> Applied for Admission </u> </b> </h1>
        <br>
        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">Name</th>
                <th style="padding: 20px; font-size: 15px;">Email</th>
                <th style="padding: 20px; font-size: 15px;">Phone</th>
                <th style="padding: 20px; font-size: 15px;">Message</th>
            </tr>

            <?php
                while($info=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td style="padding:20px;">
                 <?php echo"{$info['name']}"   ?>
                </td>
                <td style="padding:20px;">
                <?php echo"{$info['email']}"   ?>
                </td>
                <td style="padding:20px;">
                <?php echo"{$info['phone']}"   ?>
                </td>
                <td style="padding:20px;">
                <?php echo"{$info['message']}"   ?>
                </td>
            </tr>

            <?php
                }
             ?>
        </table>
        
        </CENTER>
    </div>


</body>
</html>
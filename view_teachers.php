<?php
session_start();
error_reporting(0);

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
$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);

if($_GET['teacher_id'])
{
   $t_id=$_GET['teacher_id'];
   $sql2="DELETE * FROM teacher WHERE id='$t_id' ";
   $result2=mysqli_query($data,$sql2);

   if($result2)
   {
          header('location:view_teachers.php');
   }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> View Teachers </title>

    <?php
    include 'admin_css.php';

    ?>

    <style type="text/css">
        .table_th
        {
           padding:20px;
           font-size:20px;
        }
         
        .table_td
        {
            padding:20px;
           font-size:15px;
           background-color:skyblue;
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
        <h1><b> <u> View  all Teachers data </u></b></h1>

        <table border="1px">
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Taecher</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php 
                 while($info=$result->fetch_assoc())
                 {
            ?>
            <tr>
                <td class="table_td">
                    <?php echo"{$info['name']}"  ?></td>
                <td class="table_td">
                    <?php echo"{$info['description']}"  ?></td>
                <td class="table_td">
                   <img height="100px" width="100px" src="<?php  echo"{$info['image']}"  ?>" > 
                `</td>
                <td class="table_td">
                    <?php 
                    echo "<a onClick=\"javasciprt:return confirm('Are you sure to delete this');\" class='btn btn-danger' href='view_teachers.php?teacher_id={$info['id']}'>Delete</a>";
                    ?>
                </td>

                <td class="table_td">
                <?php 
                    echo "<a  class='btn btn-primary' href='update_teachers.php?teacher_id={$info['id']}'>Update</a>";
                    ?>
                 </td>

            </tr>

            <?php
                 }
            ?>
        </table>
</div>


</body>
</html>
<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['admin_name']))
{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dadmin_page</title>
    <link rel="stylesheet" href="CSS/style_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container"> 
   <div class="content"> 
   <h3>login as admin</h3>
   <h1> <span> <?php echo $_SESSION['admin_name'] ?></span></h1>
   
  
   <a href="logout.php" class="btn"> LogOut</a>

   </div> 
</div> 
</body>
</html>
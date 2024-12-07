<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    // Only process email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);  // Encrypt password for comparison

    // Query the database for the user
    $select = "SELECT * FROM user_form WHERE email ='$email' && password ='$pass'";
    $result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_array($result);
    if($row['user_type']=='admin'){
        
        $_SESSION['admin_name'] =$row['name'];
        $_SESSION['logged_in']=true;
        header('location:admin_page.php');
    }
    elseif($row['user_type']=='user'){

        $_SESSION['user_name'] =$row['name'];
        $_SESSION['logged_in']=true;
        header('location:user_page.php');
    }

    
    
} else{
    $error[]='incorrect email or password';
}




};

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
<h3>
    Login Now
</h3>
<?php
if(isset($error))
{
    foreach($error as $error){
        echo '<span class="error-msg">' .$error.'</span>';
    }
}
?>
<input type="email" name="email"  required placeholder="enter your email" >

<input type="password" name="password"  required placeholder="enter your password" >


<input type="submit" name="submit" value="login now" class="form-btn">
<p>don't have an account? <a href="register.php"> Register Now</a></p>
</form>
</div>   


</body>
</html>
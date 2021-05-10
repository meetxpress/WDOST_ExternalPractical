<?php
   include("config.php");
   session_start();   
    if($_SERVER["REQUEST_METHOD"] == "POST") {       
        if(isset($_POST['login'])){
            $pp = md5($_POST['upass']);
            $result = mysqli_query($con, "SELECT * FROM user_master WHERE email_address = '".$_POST['uemail']."' and u_password = '$pp'");
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);                                    
            $count = mysqli_num_rows($result);                              
            if($count == 1) { 
                $_SESSION['login_user'] = $_POST['uemail'];                                                                  
                header("Location: dashboard.php");                
            } else {                
                echo "<script>alert('Your Login Name or Password is invalid')</script>";
            }
        }      
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>External Practical</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="#">
        Email: <input type="email" name="uemail" placeholder="Email"><br>
        Password: <input type="password" name="upass" placeholder="Password"><br>        
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
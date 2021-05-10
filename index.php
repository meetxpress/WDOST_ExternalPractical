<?php
    include("config.php");
    if(isset($_POST['register'])){
        function randomPassword() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); 
            $alphalen = strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphalen);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }
        $password = randomPassword();
        $pass = md5($password);        
        $uemail=$_POST['uemail'];
        $uname=$_POST['uname'];
        $gen=$_POST['gender'];        
        if($con){                                  
            $res = mysqli_query($con, "INSERT INTO user_master(email_address, u_password, u_name, gender) VALUES('$uemail', '$pass', '$uname', '$gen')");
            if(!$res){
                echo ("<h1>Can't register!</h1>");	
            } else{
                echo "<script>alert('Registration has been done Successfully. password is $password');
                   window.location.replace('login.php');
                </script>";                     
                echo "done";
            }            
        }else{
            echo "Can't Connect!";
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
    <h1>Registration</h1>
    <form method="post" action="#">
        Email: <input type="email" name="uemail" placeholder="Email"><br>
        Name: <input type="text" name="uname" placeholder="Name"><br>
        Gender: 
        Male<input type="radio" name="gender" value="M">
        Female<input type="radio" name="gender" value="F"><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
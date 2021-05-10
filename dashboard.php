<?php   
    session_start();  
    if(!isset($_SESSION['login_user'])){
        echo "<script>alert('Login first to do opertaions.');
                window.location.replace('login.php');
            </script>";   
    }
    if(isset($_POST['countTax'])){
        $tax=0; 
        $bsal = $_POST['bsal'];        
        if($bsal <= 250000) {
            $tax = ($bsal * 0) / 100;
        } else if($bsal <= 500000) {
            $tax = (($bsal-250000) * 5) / 100;
        } else if($bsal <= 750000) {
            $tax = ((($bsal-500000) * 20) / 100) + 12500;
        } else if($bsal <= 1000000) {
            $tax = ((($bsal-750000) * 30) / 100) + 12500 + 50000;
        } else {
            $tax = ((($bsal-1000000) * 35) / 100) + 12500 + 50000 + 75000;
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
    <h1>Welcome <?php echo $_SESSION['login_user']?></h1>
    <h3><a href="logout.php">Logout</a></h3>
    <form action="#" method="post">
        Enter Basic Salary: <input type="number" min="0" name="bsal" placeholder="Basic Salary"><br>
        <input type="submit" name="countTax" value="Count Tax">
    </form>
    <h2>Tax Liabilities are: Rs. <?php echo $tax?></h2>
</body>
</html>
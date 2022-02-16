<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_WebToko</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body id="bg-login">       
        <div class ="form">
            <form action="" method="POST">
            <div class="imgcontainer">
                <img src="image/20220105_135748.jpg" alt="avatar" class="avatar">

            </div>
            <h2 class="heading">Login</h2>
            <h5>Username</h5>
            <input type="text" name="user" placeholder="Username" class="container">
            <h5>Password</h5>
            <input type="password" name="pass" placeholder="password" class="container">
            <input type="submit" name="submit" value="Login" class="buton">


            </form>

        </div>
        
        <?php

            if(isset($_POST['submit'])){
                session_start();


                include "db.php";

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);
                
                $cek = mysqli_query($conn, "SELECT *FROM tb_admin WHERE username = '".$user."' AND password='".MD5($pass)."'");
                if(mysqli_num_rows($cek)>0){
                    
                    $d =  mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->admin_id;

                    echo'<script>window.location="dasboard.php"</script>';

                }else{
                    echo'<script>alert("invalid username or password")</script>';
                }
            }
        ?>

    </div>

    
</body>
</html>
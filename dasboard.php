<?php
  
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="laman.php">Amerta Elektronik</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="nav"><a href="dasboard.php">Dasboard</a></li>
      <li class="nav"><a  href="data_produk.php">Data Produk<span></span></a></li>
      <li class="nav"><a href="data_kategori.php">Data Kategori</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> profil</a></li>
      <li><a href="logout.php"><span class="fa fa-sign-out"></span> log-out</a></li>
    </ul>
  </div>
</nav>
<div class="section">
  <div class="container">
    <h3>Dasboard</h3>
    <div class="box">
      <h4>selamat datang <?php echo $_SESSION['a_global']->admin_name ?> di Dresses Online Shop</h4> 

    </div>
  </div> 

</div>
</body>
</html>

<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah | Data </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="body-profil">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Amerta Elektronik</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dasboard.php">Dasboard</a></li>
      <li><a class="dropdown-toggle"  href="data_produk.php">Data Produk<span></span></a></li>
      <li><a href="data_kategori.php">Data Kategori</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> profil</a></li>
      <li><a href="logout.php"><span class="fa fa-sign-out"></span> log-out</a></li>
    </ul>
  </div>
</nav>

<div class="section">
    <div class="container">
        
        <h3>Tambah Data</h3>
        <form action="" method="POST">

          <div class = "box">
            <h6>Nama Kategori</h6>
            <input type="text" name="nama" placeholder="Nama kategori" class="input-control-profil"  required>
            <input type="submit" name="submit" value="Submit" class="button">

          </div>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];

                $insert = mysqli_query($conn, "INSERT INTO tb_kategori VALUES (
                    null,
                    '".$nama."')");
                
                if($insert){
                    echo '<script>alert("input Data Berhasil!")</script>';
                    echo '<script>window.location="data_kategori.php"</script>';

                }else{
                    echo '<script>alert("")</script>';
                }
            }
        
        ?>
        
    </div>

</div>
</body>
</html>


<?php
  error_reporting(0);
  include 'db.php';
  $kontak = mysqli_query($conn , "SELECT admin_telp , admin_name, admin_email , admin_address FROM tb_admin WHERE admin_id = 0 ");
  $a = mysqli_fetch_object($kontak);

  $produk = mysqli_query($conn, "SELECT *FROM tb_product WHERE product_id = '".$_GET['id']."' ");
  $p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dasboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Mochiy+Pop+P+One&family=Rubik:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Amerta Elektronik</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="nav"><a  href="produk.php">Produk<span></span></a></li>
    </ul>
    <form action="produk.php">
      
      <button type="submit" name="cari" value="Cari Produk"><i class="fa fa-search"></i></button>
      <input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
      <input type="text" placeholder="Search.." name="search">
    </form>
  </div>
</nav>
<!-----detail Produk---->
<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="box">
        </div>
  </div>
</div>
<!----footer----->
<div class="footer" style="margin-top: 30px;">
  <div class="container">
  <div class="row">
      <div class="col-xs-3 text-white">
        <img src="image/Logo-Amerta_hijau.png" width="70%">
        <p style="padding-left: 1.3vw;margin-top: 8px; font-family: Eras Demi ITC; font-size: 17px">
        Toko Amerta Didirikan sejak 1980 dan menjadi salah satu Web Toko Elektronik terbaik selama ini</p>
       
      </div>
      
      <div class="col-xs-3 col-xs-offset-1 text-white">
            <h3 style="font-family:Cooper Std Black">Hubungi Kami</h3>
            <hr>
            <a href="#" target="_blank"><img style="width: 40px; height: 40px; margin-right: 1vw;" src="imgsosmed/fb.png" class="sosmed"></a>
            <a href="#" target="_blank"><img style="width: 40px; height: 40px; margin-right: 1vw;" src="imgsosmed/instagram.jpg" class="sosmed"></a>
            <a href="#" target="_blank"><img style="width: 40px; height: 40px; margin-right: 1vw;" src="imgsosmed/youtube.jpg" class="sosmed"></a>
            <h5>Admin : <?php echo $a->admin_name?></h5>
            <h5 style="margin-top: 10px;">Alamat</h5>
            <h6><?php echo $a->admin_address?></h6>
            <h5>Telp Admin : <?php echo $a->admin_telp?></h5>
            <h5>Admin Email : <?php echo $a->admin_email?></h5>
      </div>
      
      <div class="col-xs-3 col-xs-offset-1 text-white">
          <h3 style="font-family:Cooper Std Black">Komentar Pelanggan </h3>
          <hr>
      <br>
        <form action="./proses/komentar.php" method="post" role="form">
            <div class="form-group">
              <label for="nama">Nama : </label>
              <input type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
          <div class="form-group">
              <label for="email">Email : </label>
              <input type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
              <label for="pesan">Pesan : </label>
              <textarea class="form-control" name="pesan" placeholder="Masukkan pesan " style="background-color:#D6E5FA;"></textarea>
          </div>
              <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>

    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
    <small>Created By <?php echo $a->admin_name?> 2022 - Elektronik shop</small>
  </div>
</div>
</body>
</html>

<?php
  include 'db.php';
  $kontak = mysqli_query($conn , "SELECT admin_telp , admin_name, admin_email , admin_address FROM tb_admin WHERE admin_id = 0 ");
  $a = mysqli_fetch_object($kontak);
  
  $produk = mysqli_query($conn, "SELECT *FROM tb_product ");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="./assets//font-awesome/all.min.css">
  

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
      <li class="nav"><a href="dasboard.php">Admin<span></span></a></li>
    </ul>
    <form action="produk.php">
      <button type="submit" name="cari" value="Cari Produk"><i class="fa fa-search"></i></button>
      <input type="text" placeholder="Search.." name="search">
    </form>
  </div>
</nav>
<div class="section">
    <div class="container">
      <h3 style="margin-bottom: 40px;">Kategori Produk</h3>
      <div class="box">

        <?php
          $kategori = mysqli_query($conn, "SELECT *FROM tb_kategori ORDER BY category_id DESC");

          if(mysqli_num_rows($kategori)>0){
            while($k = mysqli_fetch_array($kategori)){

            
        ?>

                <a href="produk.php?kat=<?php echo $k['category_id'] ?>">
                  <div class="col-5">
                    <img src="image/category icon.png" width="50px" style="margin-top:10px ;">
                    <p><?php echo $k['category_name']?></p>
                  </div>
                </a>

        <?php } }else{?>

          <p>Tidak ada Kategori Yang ditemukan</p>

        <?php } ?>

      </div>
    </div>
</div>
<!---new produk--->
<div class="section" style="margin-top: 40px;">
  <div class="container">
    <h3 style="margin-bottom: 40px;">New Produk</h3>
    <div class="box">


      <?php 

          $produk = mysqli_query($conn, "SELECT *FROM tb_product  WHERE product_status = 1 ORDER BY product_id DESC LIMIT 5");
          if(mysqli_num_rows($produk)>0){
            while($p = mysqli_fetch_array($produk)){
      ?>

          <!--<a href="detail-produk.php?id<?php echo $p['product_id'] ?>">-->
          <div class="col-4">
            <div class="image">
              <a href="produk/<?php echo $row['product_image']?>" target="blank"><img src="produk/<?php echo $p['product_image'] ?>" style="margin-bottom: 30px;"></a>

            </div>
            <div class="name">
              <p class="nama"><?php echo $p['product_name']?></p>
            </div>
            <div class="price">
              <p class="harga">Rp. <?php echo  number_format($p['product_price'])?></p>
            </div>
            <div class="deskripsi">
              <p class="desc" style="margin-top: 20px;">Deskripsi produk : <?php echo $p['product_description']?></p>
            </div>
            <div class="phone">
              <h4 style="font-family: 'Mochiy Pop P One', sans-serif;">Beli Produk ini Melalui : </h4>
              <p><a href="https:/api.whatsapp.com/send?phone=<?php echo $a->admin_telp?>&text=Saya tertarik dengan produk <?php echo $p['product_name']?> dengan harga RP: <?php echo number_format($p['product_price'])?>Atas pelayanan Admin <?php echo $a->admin_name ?>" class="social-media-icon"><span class="fab fa-whatsapp"></span></a></p>
              <p><a class="social-media-icon" href="https://link_social_mendia_anda"><span class="fab fa-facebook"></span></a></p>
              <p><a class="social-media-icon" href="https://link_social_mendia_anda"><span class="fab fa-instagram"></span></a></p>
            </div>
            
          </div>
          <!--</a>-->
          

      <?php }}else{ ?>
        <p>produk tidak ada</p>
      <?php }?>

    </div>
  </div>
</div>

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

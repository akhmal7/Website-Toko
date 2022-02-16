<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    }
   $produk = mysqli_query($conn, "SELECT *FROM tb_product WHERE product_id = '".$_GET['id']."' ");
   if(mysqli_num_rows($produk)==0){
     echo '<script>window.location="data_produk.php"</script>';
   }
   $p = mysqli_fetch_object($produk);
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
  <link rel="stylesheet" href="css/tambah_produk.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<body id="body-profil">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dasboard.php">Amerta Elektronik</a>
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
        
        <h3>Edit Produk</h3>
        <div class = "box-item">
            <form action="" method="POST" enctype="multipart/form-data">
              <select name="kategori" class="input-control">
                <option value="">-----Pilih-----</option>
                  <?php
                    $kategori = mysqli_query($conn, "SELECT *FROM tb_kategori ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                  ?>
                  <option value="<?php echo $r['category_id']?>" <?php echo ($r['category_id']==$p->category_id)? 'selected':''; ?> ><?php echo $r['category_name']?></option>

                  <?php }?>
                
              </select>
              <input type="text" name="nama" class="col-75" placeholder="nama produk" value="<?php echo $p->product_name ?>" required>
              <input type="text" name="harga" class="col-75" placeholder="harga produk" value="<?php echo $p->product_price ?>" required>
              <img src="produk/<?php echo $p->product_image ?>" width="100px" >
              <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
              <label for="myfile" class="file"><span class="fa fa-sign-out"></span>Image Produk</label>
              <input type="file" id="myfile" name="gambar">
              <textarea name="deskripsi" class="input-control-profil" placeholder="Deskripsi barang" ><?php echo $p->product_description ?></textarea><br>
              <select class="input-control-profil" name="status">
                <option value="">--pilih--</option>
                <option value="1" <?php echo ($p->product_status==1)? 'selected':'';?>>Aktif</option>
                <option value="0"<?php echo ($p->product_status==0)? 'selected':'';?>>Tidak Aktif</option>
              </select>
              <input type="submit" name="submit" value="Submit" class="row">
              
            </form>
            
        </div>
        <?php
            if(isset($_POST['submit'])){

                // data inputan
                $kategori    = $_POST['kategori'];
                $nama        = $_POST['nama'];
                $harga       = $_POST['harga'];
                $deskripsi   = $_POST['deskripsi'];
                $status      = $_POST['status'];
                $foto        = $_POST['foto'];

                // tampung data gambar baru
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];
                

                //validasi jika admin ganti gambar
                if($filename!=''){
                  $type1 = explode('.', $filename);
                  $type2 = $type1[1];
                  $newname = 'produk'.time().'.'.$type2;

                 //menampung data format file yang diijinkan 
                $tipe_diijinkan = array('jpg','jpeg','png','gif');

                  // validasi format file
                  if(!in_array($type2,$tipe_diijinkan)){
                    //jika format file tidak diizinkan
                    echo '<script>alert("format file tidak diijinkan!")</script>';
                 }else{
                  //hapus gambar lama
                  unlink('./produk/'.$foto);
                  
                  //unpload gambar baru
                  move_uploaded_file($tmp_name,'./produk/'.$newname);
                  $namagambar = $newname;
                  
                 }


                }else{
                  //jika admin tidak ganti gambar
                  $namagambar=$foto;
                }

                // query updata data produk
                $update = mysqli_query($conn, "UPDATE tb_product SET
                category_id = '".$kategori."',
                product_name = '".$nama."',
                product_price = '".$harga."',
                product_description = '".$deskripsi."',
                product_image = '".$namagambar."',
                product_status = '".$status."' WHERE product_id = '".$p->product_id."' ");

                if($update){
                echo '<script>alert("Edit data berhasil!")</script>';
                echo '<script>window.location="data_produk.php"</script>';
                }else{
                echo 'gagal'. mysqli_error($conn);
                }
            }
               
            
        
        ?>
        
    </div>

</div>
<script>
  CKEDITOR.replace( 'deskripsi' );
</script>
</body>
</html>


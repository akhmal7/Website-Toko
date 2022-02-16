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
        
        <h3>Tambah Produk</h3>
        <div class = "box-item">
            <form action="" method="POST" enctype="multipart/form-data">
              <select name="kategori" class="input-control">
                <option value="">-----Pilih-----</option>
                  <?php
                    $kategori = mysqli_query($conn, "SELECT *FROM tb_kategori ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                  ?>
                  <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?></option>

                  <?php }?>
                
              </select>
                  <input type="text" name="nama" class="col-75" placeholder="nama produk" required>
                  <input type="text" name="harga" class="col-75" placeholder="harga produk" required>
                  <label for="myfile" class="file"><span class="fa fa-sign-out"></span>Select a file</label>
                  <input type="file" id="myfile" name="gambar">
                  <textarea name="deskripsi" class="input-control-profil" placeholder="Deskripsi barang" ></textarea><br>
              <select class="input-control-profil" name="status">
                  <option value="">--pilih--</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
              </select>
              <input type="submit" name="submit" value="Submit" class="row">
              
            </form>
            
        </div>
        <?php
            if(isset($_POST['submit'])){
               //print_r($_FILES['gambar']); 
               //menampung inputan dari form
               $kategori    = $_POST['kategori'];
               $nama        = $_POST['nama'];
               $harga       = $_POST['harga'];
               $deskripsi   = $_POST['deskripsi'];
               $status      = $_POST['status'];

               //menampung data file yang diupload
               $filename = $_FILES['gambar']['name'];
               $tmp_name = $_FILES['gambar']['tmp_name'];
               $type1 = explode('.', $filename);
               $type2 = $type1[1];
               $newname = 'produk'.time().'.'.$type2;

               
               //menampung data format file yang diijinkan 
               $tipe_diijinkan = array('jpg','jpeg','png','gif');

               //validasi format file 
               if(!in_array($type2,$tipe_diijinkan)){
                  //jika format file tidak diizinkan
                  echo '<script>alert("format file tidak diijinkan!")</script>';
               }else{
                 //proses upload file and insert ke database
                  move_uploaded_file($tmp_name,'./produk/'.$newname);
                 //jika format file sesuai dengan yang ada didalam array tipe yang diizinkan

                  
                  

                  $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES(
                                  null,
                                  '".$kategori."',
                                  '".$nama."',
                                  '".$harga."',
                                  '".$deskripsi."',
                                  '".$newname."',
                                  '".$status."',
                                  null
                                  )");

                  if($insert){
                    echo '<script>window.location="data_produk.php"</script>';

                  }else{
                    echo 'gagal'.mysqli_error($conn);
                  }

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


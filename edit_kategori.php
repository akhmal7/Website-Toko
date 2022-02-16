<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    }
   $kategori = mysqli_query($conn, "SELECT *FROM tb_kategori WHERE category_id = '".$_GET['id']."' ");
   if(mysqli_num_rows($kategori)== 0 ){
    echo '<script>window.lacation="data_kategori.php"</script>';
}
   $k = mysqli_fetch_object($kategori)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit | Data </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
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
      <li><a href="logout.php"><span class="glyphicon glyphicon-logout"></span> log-out</a></li>
    </ul>
  </div>
</nav>

<div class="section">
    <div class="container">
        
        <h3>Edit Data</h3>
        <form action="" method="POST">

          <div class = "box">
            <h6>Nama Kategori</h6>
            <input type="text" name="nama" placeholder="Nama kategori" class="input-control-profil" value="<?php echo $k->category_name ?>" required>
            <input type="submit" name="submit" value="Submit" class="button">

          </div>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];

                $update = mysqli_query($conn, "UPDATE tb_kategori SET 
                category_name = '".$nama."'
                WHERE category_id = '".$k->category_id."'");
                
                if($update){
                    echo '<script>alert("Edit Data Berhasil!")</script>';
                    echo '<script>window.location="data_kategori.php"</script>';

                }else{
                    echo 'gagal';
                }
            }
        
        ?>
        
    </div>

</div>
</body>
</html>


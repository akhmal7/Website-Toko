<?php
include 'db.php';
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Kategori</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dasboard.php">Amerta Elektronik</a>
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
  <h3>Data Kategori</h3>
      <div class ="table">
          <p class="add-data"><a href="tambah_data.php">Tambah Data</a></p>
        
        <table border="1" class="data-table">
            <thead>
                <tr>
                    <th width ="60px" style="background-color: #35858B;">No</th>
                    <th style="background-color: #35858B;">Kategori</th>
                    <th width ="200px" style="background-color: #35858B;" >Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT *FROM tb_kategori ORDER BY category_id DESc");
                    if(mysqli_num_rows($kategori)>0){

                    
                    while($row = mysqli_fetch_array($kategori)){

                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['category_name']?></td>
                    <td>
                        <a href="edit_kategori.php?id=<?php echo $row['category_id']?>">Edit</a> || <a href="hapus_kategori.php?$idk=<?php echo $row['category_id']?>" onclick="return confirm('Data akan dihapus?')" >Hapus</a>
                    </td>
                </tr>
                <?php }} else{?>
                    <tr>
                      <td colspan="3">Tidak ada data</td>
                    </tr>

                  <?php }?>
            </tbody>
        </table>

      </div>
    
    </div>
</body>
</html>

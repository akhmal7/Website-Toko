<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    }
    $query= mysqli_query($conn, "SELECT *FROM tb_admin WHERE admin_id ='".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pofil</title>
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
      <a class="navbar-brand" href="dasboard.php">Amerta Elektronik</a>
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
        
        <h2>Profile Admin <?php echo $_SESSION['a_global']->admin_name ?> </h2>
        <form action="" method="POST">
            <h6>Nama admin</h6>
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control-profil" value="<?php echo $d->admin_name?>" required>
            <h6>Username</h6>
            <input type="text" name="user" placeholder="Username" class="input-control-profil"  value="<?php echo $d->username?>" required>
            <h6>No HP</h6>
            <input type="text" name="hp" placeholder="No Hp" class="input-control-profil"  value="<?php echo $d->admin_telp?>"  required>
            <h6>Email</h6>
            <input type="email" name="email" placeholder="Email"  value="<?php echo $d->admin_email?>" class="input-control-profil"  required>
            <h6>Alamat </h6>
            <input type="text" name="alamat" placeholder="Alamat" class="input-control-profil"  value="<?php echo $d->admin_address?>"  required>
            <input type="submit" name="submit" value="Ubah Profil" class="button" style="margin-top: 10px;" style="margin-bottom: 20px;">

          </div>
        </form>
        <?php
          if(isset($_POST['submit'])){


            $nama = ucwords($_POST['nama']);
            $user = $_POST['user'];
            $hp = $_POST['hp'];
            $email = $_POST['email'];
            $alamat = ucwords($_POST['alamat']);

            $update = mysqli_query($conn, "UPDATE tb_admin SET
                            admin_name ='".$nama."',
                            username = '".$user."',
                            admin_telp = '".$hp."',
                            admin_email = '".$email."',
                            admin_address = '".$alamat."'
                            WHERE admin_id ='".$d->admin_id."' ");
            
                            if($update){
                              echo '<script>alert("Update Profil Succesfully!")</script>';
                              echo '<script>window.location= "profil.php"</script>';
                            }else{
                              echo 'gagal', mysqli_error($conn);
                            }

          }
        ?>
        <form action="" method="POST">

          <div class = "container">
            <h3 >Ubah password </h3>
            <h6 >masukkan password baru</h6>
            <input type="password" name="pass1" placeholder="masukkan password baru " class="input-control-profil"  required>
            <h6>konfirmasi password baru</h6>
            <input type="password" name="pass2" placeholder="konfirmasi password baru " class="input-control-profil" required>
            
            <input type="submit" name="ubah_password" value="Ubah Password" class="button">
          </div>
        </form>
        <?php
        
            if(isset($_POST['ubah_password'])){

                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];

                if($pass2 != $pass1){
                    echo '<script>alert("field tidak terisi sama")</script>';
                }else{

                    $u_pass = mysqli_query($conn, "UPDATE tb_admin SET password = '".MD5($pass1)."' WHERE admin_id = '".$d->admin_id."'");
                    if($u_pass){
                        echo '<script>alert("password berhasil diubah")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    }else{
                        echo 'gagal', mysqli_error($conn);
                    }
                }

            }
        
        ?>


    </div>

</div>
</body>
</html>


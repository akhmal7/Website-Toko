<?php

    include 'db.php';
    if(isset($_GET['$idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE category_id = '".$_GET['$idk']."' "); 
        echo '<script>window.location="data_kategori.php"</script>';
        
    }

?>
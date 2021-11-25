
<?php
    session_start();
    if ($_SESSION['status_login_petugas'] != true) {
      header('location:index.php');
    }
    include "koneksi.php";
    $query_login=mysqli_query($koneksi,"SELECT * FROM petugas where id_petugas = '".$_SESSION['id_petugas']."'");
    $data_login = mysqli_fetch_array($query_login);
    $_SESSION['saldo_petugas']=$data_login['saldo_petugas'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<script>
    setInterval(function(){ 
      let uang = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(<?=$_SESSION['saldo_petugas']?>);
          document.getElementById("saldo").innerHTML  = uang;  
    }, 1);
  </script>
<body>
  <nav class="navbar navbar-dark bg-dark shadow-sm navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="tampil_buku.php">ini toko onlen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="tampil_siswa.php">Data Pelanggan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tampil_peminjaman.php">Data Peminjaman</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="ubah_petugas.php" id="saldo"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proses_logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
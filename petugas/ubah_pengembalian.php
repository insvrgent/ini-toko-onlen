<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengembalian Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
        include "navbar.php";
        include "koneksi.php";
        $qry_get_pengembalian=mysqli_query($koneksi, "select * from pengembalian_buku where id_pengembalian_buku ='".$_GET['id_pengembalian_buku']."'");
        $dt_pengembalian=mysqli_fetch_array($qry_get_pengembalian);
    ?>
    <br></br>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="pengembalian_buku-01.png" class="image-fluid" alt="image" width="100%" height="100%"/>
            </div>
            <div class="col-md-6">
                <h3 class="mb-2 text-center"> Ubah Pengembalian Buku</h3>
                <form action="proses_ubah_pengembalian.php" method="POST">
                    <input type="hidden" name="id_pengembalian_buku" value="<?=$dt_pengembalian ['id_pengembalian_buku'] ?>">
                    <div class="mb-3">
                        <!-- Siswa -->
                        <div class="mb-2">
                            <label class="form-label">Siswa :</label>
                            <select name="id_peminjaman_buku" class="form-control form">
                                <option></option>
                                <?php 
                                    include "koneksi.php";
                                        $qry_siswa=mysqli_query($koneksi,"select * from siswa");
                                        while($data_siswa=mysqli_fetch_array($qry_siswa)){
                                            if($data_siswa['id_siswa']==$dt_pengembalian['id_pengembalian_buku']) {
                                                $selek="selected";
                                            }else{
                                                $selek="";
                                            }
                                            echo '<option value="'.$data_siswa['id_siswa'].'"'.$selek.'>'.$data_siswa['nama_siswa'].'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                        <!-- Tanggal Pengembalian -->
                        <div class="mb-2">
                            <label class="form-label">Tanggal Pengembalian :</label>
                            <input type="date" name="tanggal_pengembalian" value="<?=$dt_pengembalian ['tanggal_pengembalian'] ?>" class="form-control form" required> 
                        </div>
                        <!-- Denda -->
                        <div class="mb-2">
                            <label class="form-label">Denda :</label>
                            <input type="number" name="denda" value="<?=$dt_pengembalian ['denda'] ?>" class="form-control form" required> 
                        </div>
                    </div>
                    <input type = "submit" name ="simpan" value ="Tambah" class = "btn mb-2">
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
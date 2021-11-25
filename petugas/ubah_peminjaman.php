<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Peminjaman Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
        include "navbar.php";
        include "koneksi.php";
        $qry_get_pinjam=mysqli_query($koneksi, "select * from peminjaman_buku where id_peminjaman_buku ='".$_GET['id_peminjaman_buku']."'");
        $dt_pinjam=mysqli_fetch_array($qry_get_pinjam);
    ?>
    <br></br>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="peminjaman_buku-01.png" class="image-fluid" alt="image" width="100%" height="100%"/> 
            </div>
            <div class="col-md-6">
                <h3 class="mb-2 text-center">Ubah Peminjaman Buku</h3>
                <form action="proses_ubah_peminjaman.php" method="POST">
                    <input type="hidden" name="id_peminjaman_buku" value="<?=$dt_pinjam ['id_peminjaman_buku'] ?>">
                    <div class="mb-4">
                        <!-- Siswa -->
                        <div class="mb-2">
                            <label class="form-label">Siswa :</label>
                            <select name="id_siswa" value="<?=$dt_pinjam ['id_siswa'] ?>" class="form-control form">
                                <option></option>
                                <?php 
                                    include "koneksi.php";
                                        $qry_siswa=mysqli_query($koneksi,"select * from siswa");
                                        while($data_siswa=mysqli_fetch_array($qry_siswa)){
                                            if($data_siswa['id_siswa']==$dt_pinjam['id_siswa']) {
                                                $selek="selected";
                                            }else{
                                                $selek="";
                                            }
                                            echo '<option value="'.$data_siswa['id_siswa'].'"'.$selek.'>'.$data_siswa['nama_siswa'].'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                        <!-- Tangga pinjam -->
                        <div class="mb-2">
                            <label class="form-label">Tanggal Pinjam :</label>
                            <input type="date" name="tanggal_pinjam" value="<?=$dt_pinjam ['tanggal_pinjam'] ?>" class="form-control form" > 
                        </div>
                        <!-- Tanggal Kembali -->
                        <div class="mb-2">
                            <label class="form-label">Tanggal Kembali :</label>
                            <input type="date" name="tanggal_kembali" value="<?=$dt_pinjam ['tanggal_kembali'] ?>" class="form-control form" > 
                        </div>
                    </div>
                    <input type = "submit" name ="simpan" value ="Ubah" class = "btn">
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
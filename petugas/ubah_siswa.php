<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
        include "navbar.php";
        include "koneksi.php";
        include "format.php";
        $qry_get_siswa=mysqli_query($koneksi, "select * from siswa where id_siswa ='". $_SESSION['id_siswa']."'");
        $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <br></br>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
            </div>
            <div class="col-md-6">
                <h3 class="mb-2 text-center">Profil</h3>
                <form action="proses_ubah_siswa.php" method="POST">
                    <input type="hidden" name="id_siswa" value="<?=$dt_siswa ['id_siswa'] ?>">
                    <div class="row g-3 mb-4">
                        <!-- username -->
                        <div class="col-md">
                            <label class="form-label"> Username :</label>
                            <input type = "text" name = "username" value = "<?=$dt_siswa ['username'] ?>" placeholder="Masukkan Username" class = "form-control form" required>
                        </div>
                        <!-- password -->
                        <div class="col-md"> 
                            <label class="form-label">Password :</label>
                            <input type = "password" name ="password" value ="" placeholder="Masukkan Password" class = "form-control form">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <!-- nama -->
                        <div class="col-md">
                            <label class="form-label">Nama siswa :</label>
                            <input type="text" name="nama_siswa" value="<?=$dt_siswa ['nama_siswa'] ?>" placeholder="Masukkan Nama" class="form-control form" required>
                        </div>
                        <!-- saldo -->
                        <div class="col-md">
                            <label class="form-label">Saldo :</label>
                            <input type="text" name="saldo" value="<?=$dt_siswa ['saldo'] ?>" placeholder="Masukkan saldo" class="form-control form" required>
                        </div>
                        
                    </div>
                    <div class="row g-3 mb-2">
                        <!-- tanggal lahir -->
                        <div class="col-md">
                            <label class="form-label">Tanggal Lahir :</label>
                            <input type = "date" name="tanggal_lahir" value="<?=$dt_siswa ['tanggal_lahir'] ?>" class="form-control form" required>
                        </div>
                        <!-- gender -->
                        <div class="col-md">
                            <label for="gender" class="form-label">Gender :</label>
                            <select name="gender" class="form-select form" >
                                <?php
                                    $selected = $dt_siswa['gender'];
                                ?>
                                <option value="L" <?php if($selected == 'L'){echo("selected");}?>>Laki Laki</option>
                                <option value="P"<?php if($selected == 'P'){echo("selected");}?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <!-- alamat -->
                    <div class="mb-2">
                        <label class="form-label">Alamat :</label>
                        <textarea name="alamat" class="form-control textarea" rows="4" placeholder="Masukkan Alamat" required><?=$dt_siswa['alamat']?></textarea>
                    </div>
                    <input type = "submit" class="btn btn-primary" name ="simpan" value ="Ubah Profil">
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
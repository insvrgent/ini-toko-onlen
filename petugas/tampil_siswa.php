<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet_tampil.css">
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
               <h3 class="text-center mt-2 mb-3">Data Siswa<h3>    
                <form action="tampil_siswa.php" method="post">
                    <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                </form> 
            </div>
            <div class="card-body">
                <table class="table table-bordered fs-5 fw-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Username</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            if (isset($_POST["cari"])) {
                                // jika ada keyword pencarian 
                                $cari=$_POST['cari'];
                                $query_siswa= mysqli_query($koneksi, "select * from siswa where id_siswa = '$cari' or nama_siswa like '%$cari%' or gender like '%$cari%'");
                            }else{
                                //jika tidak ada keyword pencarian
                                $query_siswa= mysqli_query($koneksi, "select * from siswa");
                            }
                            while($data_siswa= mysqli_fetch_array($query_siswa)) { ?>
                                <tr>
                                    <td><?php echo $data_siswa["id_siswa"]; ?></td>
                                    <td><?php echo $data_siswa["nama_siswa"]; ?></td>
                                    <td><?php echo $data_siswa["tanggal_lahir"]; ?></td>
                                    <td><?php if($data_siswa["gender"] == 'L'){echo("Laki Laki");} else if($data_siswa["gender"] == 'P'){echo("Perempuan");}?></td>

                                    <td><?php echo $data_siswa["alamat"]; ?></td>
                                    <td><?php echo $data_siswa["username"]; ?></td>
                                    <td> <a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Ubah</a> | <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <a href="tambah_siswa.php" type="button" class="btn btn-tambah">Tambah Siswa</a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
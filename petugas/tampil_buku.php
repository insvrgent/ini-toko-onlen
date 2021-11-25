<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet_tampil.css">
</head>
<body>
    <?php
        include "koneksi.php";
        include "navbar.php";
        include "format.php";
        error_reporting(0);
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-right mt-2 mb-2">Produk Anda<h3>
                <form action="tampil_buku.php" method="post">
                    <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered fs-5 fw-light text-center">
                    <?php
                        if (isset($_POST["cari"])) {
                            // jika ada keyword pencarian 
                            $cari=$_POST['cari'];
                            $query_buku= mysqli_query($koneksi,"select * from buku where (id_buku like '%$cari%' or nama_buku like '%$cari%' or pengarang like '%$cari%') and id_petugas='".$_SESSION['id_petugas']."'");
                            $dd= mysqli_query($koneksi,"select * from buku where (id_buku like '%$cari%' or nama_buku like '%$cari%' or pengarang like '%$cari%') and id_petugas='".$_SESSION['id_petugas']."'");
                            
                        }else{
                            //jika tidak ada keyword pencarian
                            $query_buku= mysqli_query($koneksi,"select * from buku where id_petugas='".$_SESSION['id_petugas']."'");
                        }
                        if (isset($_POST["cari"])&&!in_array($cari, mysqli_fetch_array($dd))) {?>
                            <tr>
                            <?php echo "pencarian tidak menemukan hasil" ?>
                            </tr>
                            <?php
                        }
                        else
                        {?>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Merek</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                                <tbody><?php
                                    while($data_buku= mysqli_fetch_array($query_buku)) {
                                        ?>
                                        <tr>
                                        <td><?php echo $data_buku["id_buku"]; ?></td>
                                        <td><?php echo $data_buku["nama_buku"]; ?></td>
                                        <td><?php echo $data_buku["pengarang"]; ?></td>
                                        <td><?php echo $data_buku["deskripsi"]; ?></td>
                                        <td><?php echo format($data_buku["harga"]); ?></td>
                                        <td><img src="foto/<?=$data_buku['foto']?>" class="bd-placeholder-img card-img-top"  xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title></td>
                                        <td> <a href="ubah_buku.php?id_buku=<?=$data_buku['id_buku']?>" class="btn btn-success">Ubah</a> | <a href="hapus_buku.php?id_buku=<?=$data_buku['id_buku']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                                        </tr>
                                    <?php
                                    }?>
                                </tbody>
                        <?php
                        }
                        ?>
                    
                    
                </table>
                <a href="tambah_buku.php" type="button" class="btn btn-tambah">Tambah Barang</a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
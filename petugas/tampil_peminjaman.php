<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Peminjaman</title>
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
                <h3 class="mt-2 mb-3 text-center">Data Peminjaman<h3>
                <form action="tampil_peminjaman.php" method="post">
                    <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                </form>
            </div>
            <div class='card-body'>
                <table class="table table-bordered fs-5 fw-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            if (isset($_POST["cari"])) {
                                // jika ada keyword pencarian 
                                $cari=$_POST['cari'];
                                $query_pinjam= mysqli_query($koneksi,"select * from peminjaman_buku join siswa on siswa.id_siswa=peminjaman_buku.id_siswa join kelas on siswa.id_kelas=kelas.id_kelas where peminjaman_buku.id_peminjaman_buku like '%$cari%' or siswa.nama_siswa like '%$cari%' or kelas.nama_kelas like '%$cari%' ");
                            }else{
                                //jika tidak ada keyword pencarian
                                $query_pinjam= mysqli_query($koneksi,"select * from peminjaman_buku join siswa on siswa.id_siswa=peminjaman_buku.id_siswa");
                            }
                            while($data_pinjam= mysqli_fetch_array($query_pinjam)) { ?>
                                <tr>
                                    <td><?php echo $data_pinjam["id_peminjaman_buku"]; ?></td>
                                    <td><?php echo $data_pinjam["nama_siswa"]; ?></td>
                                    <td><?php echo $data_pinjam["tanggal_pinjam"]; ?></td>
                                    <td><?php echo $data_pinjam["tanggal_kembali"]; ?></td>
                                    <td> <a href="ubah_peminjaman.php?id_peminjaman_buku=<?=$data_pinjam['id_peminjaman_buku']?>" class="btn btn-success">Ubah</a> | <a href="hapus_peminjaman.php?id_peminjaman_buku=<?=$data_pinjam['id_peminjaman_buku']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
                <a href="peminjaman_buku.php" type="button" class="btn btn-tambah">Tambah Data</a>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
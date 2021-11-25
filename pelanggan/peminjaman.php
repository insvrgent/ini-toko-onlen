<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<style>
    li.no{
  list-style-type: none;
    }
</style>
<body>
    <?php
        include "navbar.php";
        include "format.php";
        include "koneksi.php";
    ?>
    <br></br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Riwayat Pembelian Barang</h1>
            </div>
            <div class="card-body">
                    <?php 
                    $query_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku 
                    where id_siswa = '".$_SESSION['id_siswa']."' ORDER BY id_peminjaman_buku DESC");
                    $no=0;
                    while($data_peminjaman=mysqli_fetch_array($query_peminjaman))
                    {
                        $no++;
                    }
                        if ($no!=0){?>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">CHECKOUT</th>
                                    <th scope="col">SAMPAI</th>
                                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;NAMA Barang</th>
                                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;harga</th>
                                    <th scope="col">&nbsp;&nbsp;jumlah</th>
                                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;total</th>
                                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STATUS</th>
                                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku 
                                    where id_siswa = '".$_SESSION['id_siswa']."' ORDER BY id_peminjaman_buku DESC");
                                    $no=0;
                                    while($data_peminjaman=mysqli_fetch_array($query_peminjaman)){
                                                $no++;
                                            ?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=$data_peminjaman['tanggal_pinjam']?></td>
                                                <td><?=$data_peminjaman['tanggal_kembali']?></td>
                                                <td>
                                                    <ol>
                                                    <?php
                                                    $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman_buku d
                                                                    JOIN buku b ON b.id_buku = d.id_buku WHERE
                                                                    id_peminjaman_buku = '".$data_peminjaman['id_peminjaman_buku']."'");
                                                    while($data_detail = mysqli_fetch_array($query_detail)){
                                                        echo "<li>".$data_detail['nama_buku']."</li>";
                                                    }
                                                    ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ol>
                                                    <?php
                                                    $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman_buku d
                                                                    JOIN buku b ON b.id_buku = d.id_buku WHERE
                                                                    id_peminjaman_buku = '".$data_peminjaman['id_peminjaman_buku']."'");
                                                    while($data_detail = mysqli_fetch_array($query_detail)){
                                                        echo "<li class='no'>".formatRp($data_detail['total']/$data_detail['qty'])."</li>";
                                                    }
                                                    ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ol>
                                                    <?php
                                                    $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman_buku d
                                                                    JOIN buku b ON b.id_buku = d.id_buku WHERE
                                                                    id_peminjaman_buku = '".$data_peminjaman['id_peminjaman_buku']."'");
                                                    while($data_detail = mysqli_fetch_array($query_detail)){
                                                        echo "<li class='no'>".$data_detail['qty']."</li>";
                                                    }
                                                    ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ol>
                                                    <?php
                                                    $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman_buku d
                                                                    JOIN buku b ON b.id_buku = d.id_buku WHERE
                                                                    id_peminjaman_buku = '".$data_peminjaman['id_peminjaman_buku']."'");
                                                    while($data_detail = mysqli_fetch_array($query_detail)){
                                                        echo "<li class='no'>".formatRp($data_detail['total'])."</li>";
                                                    }
                                                    ?>
                                                    </ol>
                                                </td>
                                                <?php
                                                //https://www.daniweb.com/programming/web-development/threads/477372/deadline-php-script-with-mysql
                                                $deadline = $data_peminjaman['tanggal_kembali'];
                                                $todays_date = date("Y-m-d");
                                                $today = strtotime($todays_date);
                                                $expiration_date = strtotime($deadline);
                                                $timeDiff = abs($expiration_date-$today);
                                                $num_day = $timeDiff/86400; // 1day = 86400 sec
                                                $num_of_days = intval($num_day);


                                                if ($expiration_date > $today) {
                                                    echo "<td><label class='alert alert-danger'>Sampai $num_of_days hari lagi<br></label></td>";
                                                    echo "<td><a href='kembali.php?id=".$data_peminjaman['id_peminjaman_buku']."' class='btn btn-warning'
                                                    onclick='return confirm('Apakah anda yakin mengembalikan buku ini?')'>Batalkan Pemesanan</a></td>";
                                                } 
                                                else { 
                                                    echo "<td>";
                                                    echo "<label class='alert alert-success'>
                                                        Sudah Sampai</label>";
                                                    echo "</td>";
                                                    echo "<td></td>";
                                                } 
                                                ?>
                                            </tr>
                                    <?php } ?>
                                </tbody>
                            </table><?php 
                    }
                    else
                    {
                        echo "tidak ada riwayat";
                    }?>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>


</body>
</html>
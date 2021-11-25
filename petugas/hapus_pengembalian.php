<?php
    if ($_GET['id_pengembalian_buku']) {
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi, "delete from pengembalian_buku where id_pengembalian_buku='".$_GET['id_pengembalian_buku']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus data pengembalian'); location.href='tampil_pengembalian.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus pengembalian'); location.href='tampil_pengembalian.php';</script>";
        }
    }
?> 
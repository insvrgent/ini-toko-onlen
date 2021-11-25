<?php
    if ($_GET['id_peminjaman_buku']) {
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi, "delete from peminjaman_buku where id_peminjaman_buku='".$_GET['id_peminjaman_buku']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus data peminjaman'); location.href='tampil_peminjaman.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus peminjaman'); location.href='tampil_peminjaman.php';</script>";
        }
    }
?> 
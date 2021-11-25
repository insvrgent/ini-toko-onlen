<?php
    if ($_GET['id_detail_peminjaman_buku']) {
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi, "delete from detail_peminjaman_buku where id_detail_peminjaman_buku= '".$_GET['id_detail_peminjaman_buku']."'");
        if ($qry_hapus) {
            echo "<script>alert ('Sukses hapus data detail'); location.href='tampil_detail.php';</script>";
        }else {
            echo "<script>alert ('Gagal hapus detail'); location.href='tampil_detail.php';</script>";
        }
    }
?> 
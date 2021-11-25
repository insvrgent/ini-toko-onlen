<?php
    if ($_GET['id']) {
        include "koneksi.php";
        $id = $_GET['id'];
        
        session_start();
        unset($_SESSION['cart'][$_GET['id']]);
        
        $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_peminjaman_buku d
        JOIN petugas b ON b.id_petugas = d.id_petugas WHERE
        id_peminjaman_buku = '".$id."'");

        while($data_detail = mysqli_fetch_array($query_detail)){
            mysqli_query ($koneksi, "update petugas set saldo_petugas= saldo_petugas - '".$data_detail['total']."' where id_petugas= '".$data_detail['id_petugas']."' ");
        }

        $cek_terlambat = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku
                         WHERE id_peminjaman_buku = '".$id."'");
        $data_pinjam = mysqli_fetch_array($cek_terlambat);
        $_SESSION['saldo']+=$data_pinjam['total'];
        mysqli_query ($koneksi, "update siswa set saldo='".$_SESSION['saldo']."' where id_siswa= '".$_SESSION['id_siswa']."' ");
        
        mysqli_query($koneksi, "DELETE FROM detail_peminjaman_buku WHERE id_detail_peminjaman_buku = '".$id."'");
        $kembali = mysqli_query($koneksi, "DELETE FROM peminjaman_buku WHERE id_peminjaman_buku = '".$id."'");
        
        if ($kembali) {
            echo "<script>alert('Pembatalan pemesanan Berhasil');location.href='peminjaman.php';</script>";
        }
        else{
            echo "<script>alert('Pembatalan pemesanan Gagal');location.href='peminjaman.php';</script>";
        }
    }
?>

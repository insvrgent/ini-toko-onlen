<?php
    if ($_POST) {
        $id_siswa=$_POST["id_siswa"];
        $id_peminjaman_buku=$_POST["id_peminjaman_buku"];
        $tanggal_pinjam = $_POST["tanggal_pinjam"];
        $tanggal_kembali = $_POST["tanggal_kembali"];

        if (empty ($id_siswa)) {
            echo "<script> alert ('nama siswa tidak boleh kosong'); location.href='ubah_peminjaman.php' ; </script>";

        } elseif (empty ($tanggal_pinjam)) {
            echo "<script> alert ('tanggal pinjam tidak boleh kosong'); location.href='ubah_peminjaman.php' ; </script>";
        }  elseif (empty ($tanggal_kembali)) {
            echo "<script> alert ('tanggal kembali tidak boleh kosong'); location.href='ubah_peminjaman.php' ; </script>";
        }else {
            include "koneksi.php";
            $update= mysqli_query ($koneksi, "update peminjaman_buku set id_siswa='".$id_siswa."', tanggal_pinjam='".$tanggal_pinjam."', tanggal_kembali='".$tanggal_kembali."' where id_peminjaman_buku='".$id_peminjaman_buku."' ") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script> alert ('Sukses update data peminjaman'); location.href='tampil_peminjaman.php' ; </script>";  
            }else{
                echo "<script> alert ('Gagal update data peminjaman'); location.href='tampil_peminjaman.php' ; </script>";
            }
        }
        
    }
?>
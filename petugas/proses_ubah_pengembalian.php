<?php
    if ($_POST) {
        $id_pengembalian_buku=$_POST["id_pengembalian_buku"];
        $id_peminjaman_buku=$_POST["id_peminjaman_buku"];
        $tanggal_pengembalian = $_POST ["tanggal_pengembalian"];
        $denda = $_POST ["denda"];

        if(empty($id_peminjaman_buku)){
            echo "<script>alert('nama siswa tidak boleh kosong');location.href='ubah_pengembalian.php';</script>";
     
        } elseif(empty($tanggal_pengembalian)){
            echo "<script>alert('tanggal pengembalian tidak boleh kosong');location.href='ubah_pengembalian.php';</script>";
        } else {
            include "koneksi.php";
            $update= mysqli_query ($koneksi, "update pengembalian_buku set id_peminjaman_buku='".$id_peminjaman_buku."', tanggal_pengembalian='".$tanggal_pengembalian."', denda='".$denda."' where id_pengembalian_buku='".$id_pengembalian_buku."' ") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script> alert ('Sukses update data pengembalian'); location.href='tampil_pengembalian.php' ; </script>";  
            }else{
                echo "<script> alert ('Gagal update data pengembalian'); location.href='tampil_pengembalian.php' ; </script>";
            }
        }
        
    }
?>
<?php
    if ($_POST) {
        $id_detail_peminjaman_buku=$_POST["id_detail_peminjaman_buku"];
        $id_peminjaman_buku=$_POST["id_peminjaman_buku"];
        $id_buku=$_POST["id_buku"];
        $qty = $_POST ["qty"];

        if(empty($id_peminjaman_buku)){
            echo "<script>alert('nama siswa tidak boleh kosong');location.href='ubah_detail.php';</script>";
     
        } elseif(empty($id_buku)){
            echo "<script>alert('nama buku tidak boleh kosong');location.href='ubah_detail.php';</script>";
        } elseif(empty($qty)){
            echo "<script>alert('jumlah tidak boleh kosong');location.href='ubah_detail.php';</script>";
        } else {
            include "koneksi.php";
            $update= mysqli_query ($koneksi, "update detail_peminjaman_buku set id_detail_peminjaman_buku='".$id_detail_peminjaman_buku."', id_peminjaman_buku='".$id_peminjaman_buku."', id_buku='".$id_buku."', qty='".$qty."' where id_detail_peminjaman_buku='".$id_detail_peminjaman_buku."' ") or die (mysqli_error($koneksi));
            if ($update) {
                echo "<script> alert ('Sukses update detail peminjaman'); location.href='tampil_detail.php' ; </script>";  
            }else{
                echo "<script> alert ('Gagal update detail peminjaman'); location.href='tampil_detail.php' ; </script>";
            }
        }
        
    }
?>
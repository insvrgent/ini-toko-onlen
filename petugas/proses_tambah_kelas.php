<?php
    $nama_kelas = $_POST["nama_kelas"];
    $kelompok = $_POST ["kelompok"];

    if (empty ($nama_kelas)) {
        echo "<script> alert ('nama kelas tidak boleh kosong'); location.href='tambah_kelas.php' ; </script>";

    } elseif (empty ($kelompok)) {
        echo "<script> alert ('kelompok tidak boleh kosong'); location.href='tambah_kelas.php' ; </script>";
    }else{
        include "koneksi.php";
        $input = mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas, kelompok) VALUES ('".$nama_kelas."','".$kelompok."')"); 
        if ($input) {
            echo "<script>alert('Berhasil');location.href='tampil_kelas.php';</script>";
        } 
        else {
            echo "<script>alert('Gagal');location.href='tampil_kelas.php';</script>";
        }
    }
    
?>
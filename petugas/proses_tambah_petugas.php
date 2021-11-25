<?php
if($_POST){
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $saldo=$_POST['saldo'];
    if(empty($nama_petugas)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_petugas.php';</script>";
 
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into petugas (nama_petugas,username, password, saldo_petugas) value ('".$nama_petugas."','".$username."','".md5($password)."','".$saldo."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses menambahkan siswa');location.href='tampil_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_petugas.php';</script>";
        }
    }
}
?>
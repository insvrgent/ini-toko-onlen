<?php
    if ($_POST) {
        $id_petugas= $_POST['id_petugas'];
        $nama_siswa= $_POST['nama_petugas'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        $saldo= $_POST['saldo_petugas'];

        if (empty ($nama_siswa)) {
            echo "<script> alert ('nama siswa tidak boleh kosong'); location.href='ubah_petugas.php' ; </script>";

        } elseif (empty ($username)) {
            echo "<script> alert ('username tidak boleh kosong'); location.href='ubah_petugas.php' ; </script>";
        } else {
            include "koneksi.php";
            if (empty ($password)) {
                $update= mysqli_query ($koneksi, "update petugas set nama_petugas='".$nama_siswa."',saldo_petugas='".$saldo."', username='".$username."' where id_petugas = '".$id_petugas."'") or die (mysqli_error($koneksi));
                if($update){
                    echo "<script> alert ('Sukses update siswa'); location.href='tampil_buku.php' ; </script>";
                }else{
                    echo "<script> alert ('Gagal update siswa'); location.href='ubah_petugas.php' ; </script>";
                }
            }else {
                $update= mysqli_query ($koneksi, "update petugas set nama_petugas='".$nama_siswa."',saldo_petugas='".$saldo."', username='".$username."', password='" .md5 ($password)."', where id_petugas= '".$id_petugas."' ") or die (mysqli_error($koneksi));
                if ($update) {
                    echo "<script> alert ('Sukses update petugas'); location.href='tampil_buku.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update petugas'); location.href='ubah_petugas.php' ; </script>";
                }
            }
        }
    }
?>
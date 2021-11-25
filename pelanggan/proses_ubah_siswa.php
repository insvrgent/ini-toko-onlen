<?php
    if ($_POST) {
        $id_siswa= $_POST['id_siswa'];
        $nama_siswa= $_POST['nama_siswa'];
        $tanggal_lahir= $_POST['tanggal_lahir'];
        $alamat= $_POST['alamat'];
        $gender= $_POST['gender'];
        $saldo= $_POST['saldo'];
        $username= $_POST['username'];
        $password= $_POST['password'];
        
        if (empty ($nama_siswa)) {
            echo "<script> alert ('nama siswa tidak boleh kosong'); location.href='ubah_siswa.php' ; </script>";

        } elseif (empty ($username)) {
            echo "<script> alert ('username tidak boleh kosong'); location.href='ubah_siswa.php' ; </script>";
        } else {
            include "koneksi.php";
            if (empty ($password)) {
                $update= mysqli_query ($koneksi, "update siswa set nama_siswa='".$nama_siswa."', tanggal_lahir='".$tanggal_lahir."', gender='".$gender."', alamat='".$alamat."', username='".$username."' , saldo='".$saldo."' where id_siswa = '".$id_siswa."'") or die (mysqli_error($koneksi));
                if($update){
                    echo "<script> alert ('Sukses update siswa'); location.href='buku.php' ; </script>";
                }else{
                    echo "<script> alert ('Gagal update siswa'); location.href='buku.php' ; </script>";
                }
            }else {
                $update= mysqli_query ($koneksi, "update siswa set nama_siswa='".$nama_siswa."',tanggal_lahir='".$tanggal_lahir."', gender= '".$gender."', alamat='".$alamat."', username='".$username."', saldo='".$saldo."', password='" .md5 ($password)."'where id_siswa= '".$id_siswa."' ") or die (mysqli_error($koneksi));
                if ($update) {
                    echo "<script> alert ('Sukses update siswa'); location.href='buku.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update siswa'); location.href='buku.php' ; </script>";
                }
            }
        }
    }
?>
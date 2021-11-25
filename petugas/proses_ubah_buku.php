<?php
    if ($_POST) {
        $id_buku=$_POST["id_buku"];
        $nama_buku = $_POST["nama_buku"];
        $pengarang = $_POST ["pengarang"];
        $deskripsi = $_POST ["deskripsi"];
        $harga=$_POST['harga'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_name=rand(0,9999).$_FILES['foto']['name'];
        $file_size= $_FILES['foto']['size'];
        $file_type= $_FILES['foto']['type'];
        $folder="gambar/";

        if (empty ($nama_buku)) {
            echo "<script> alert ('nama buku tidak boleh kosong'); location.href='ubah_buku.php' ; </script>";

        } elseif (empty ($pengarang)) {
            echo "<script> alert ('pengarang tidak boleh kosong'); location.href='ubah_buku.php' ; </script>";
        }elseif(empty ($deskripsi)) {
            echo "<script> alert ('deskripsi tidak boleh kosong'); location.href='ubah_buku.php' ; </script>";
        }elseif(empty ($harga)) {
            echo "<script> alert ('harga tidak boleh kosong'); location.href='ubah_buku.php' ; </script>";
        } else {
            include "koneksi.php";
            $sql=mysqli_query($koneksi, "select * from buku where id_buku='$id_buku'");
            $buku=mysqli_fetch_array($sql);
            $path=$folder.$buku["foto"];
            if(file_exists($path)){
                unlink($path); 
            }
            if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png")){
                move_uploaded_file($file_tmp, 'foto/'.$file_name);
                $update= mysqli_query ($koneksi, "update buku set nama_buku='".$nama_buku."', pengarang='".$pengarang."', deskripsi='".$deskripsi."', harga='".$harga."', foto='".$file_name."' where id_buku='".$id_buku."' ") or die (mysqli_error($koneksi));
                if ($update) {
                    echo "<script> alert ('Sukses update buku'); location.href='tampil_buku.php' ; </script>";  
                }else{
                    echo "<script> alert ('Gagal update buku'); location.href='tampil_buku.php' ; </script>";
                } 
                
           
            }else{
                echo "<script>alert('file tidak sesuai');location.href='tampil_buku.php';</script>";
            }
        }
        
    }
?>
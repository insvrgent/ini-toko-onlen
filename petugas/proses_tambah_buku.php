<?php
    if($_POST){
        session_start();
        $nama_buku=$_POST['nama_buku'];
        $pengarang=$_POST['pengarang'];
        $deskripsi=$_POST['deskripsi'];
        $harga=$_POST['harga'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_name=rand(0,9999).$_FILES['foto']['name'];
        $file_size= $_FILES['foto']['size'];
        $file_type= $_FILES['foto']['type'];

        if(empty($nama_buku)){
            echo "<script>alert('nama buku tidak boleh kosong');location.href='tambah_buku.php';</script>";
     
        } elseif(empty($pengarang)){
            echo "<script>alert('pengarang tidak boleh kosong');location.href='tambah_buku.php';</script>";
        } elseif(empty($deskripsi)){
            echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_buku.php';</script>";
        } elseif(empty($harga)){
            echo "<script>alert('harga tidak boleh kosong');location.href='tambah_buku.php';</script>";
        } else {
            include "koneksi.php";
            if($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type== "image/png")){
               move_uploaded_file($file_tmp, 'foto/'.$file_name);
                $insert=mysqli_query($koneksi,"insert into buku (id_petugas,nama_buku, pengarang, deskripsi,harga, foto) value ('".$_SESSION['id_petugas']."','".$nama_buku."', '".$pengarang."', '".$deskripsi."', '".$harga."', '".$file_name."')") or die(mysqli_error($koneksi));
                if($insert){
                    // echo "<script>alert('Sukses menambahkan buku');location.href='tampil_buku.php';</script>";
                } else {
                    //echo "<script>alert('Gagal menambahkan buku');location.href='tampil_buku.php';</script>";
                } 
            }else{
                echo "<script>alert('file tidak sesuai');location.href='tampil_buku.php';</script>";
            }
            header('location:tampil_buku.php');  
        }
    }
    
?>
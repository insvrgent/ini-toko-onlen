<?php
if($_POST){
    $id_siswa=$_POST['id_siswa'];
    $tanggal_pinjam=$_POST['tanggal_pinjam'];
    $tanggal_kembali=$_POST['tanggal_kembali'];
    if(empty($id_siswa)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='peminjaman_buku.php';</script>";
 
    } elseif(empty($tanggal_pinjam)){
        echo "<script>alert('tanggal pinjam tidak boleh kosong');location.href='peminjaman_buku.php';</script>";
    } elseif(empty($tanggal_kembali)){
        echo "<script>alert('tanggal kembali tidak boleh kosong');location.href='peminjaman_buku.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into peminjaman_buku (id_siswa,tanggal_pinjam, tanggal_kembali) value ('".$id_siswa."','".$tanggal_pinjam."','".$tanggal_kembali."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses menambah data peminjaman');location.href='tampil_peminjaman.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data peminjaman');location.href='tampil_peminjaman.php';</script>";
        }
    }
}
?>
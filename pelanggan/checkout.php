<?php
    session_start();
    include "koneksi.php";
    $cart = @$_SESSION['cart'];
    if (count($cart) > 0) {
        $lama_pinjam = 7;
        $tgl_harus_kembali = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+$lama_pinjam,date('Y')));
        $total = 0;
        

        foreach ($cart as $key => $value) {
            $total+=$value['harga']*$value['qty'];
        }
        if ($_SESSION['saldo']>=$total) {
            $query_pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman_buku (id_peminjaman_buku, id_siswa, tanggal_pinjam, tanggal_kembali,total)
            VALUES ('".mysqli_insert_id($koneksi)."', '".$_SESSION['id_siswa']."', '".date('Y-m-d')."', '".$tgl_harus_kembali."', '".$total."')");
            
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku WHERE
            id_peminjaman_buku = '".mysqli_insert_id($koneksi)."'");
            
            $nomor = mysqli_fetch_array($query);
            foreach ($cart as $key => $value) {
                mysqli_query($koneksi, "INSERT INTO detail_peminjaman_buku (id_peminjaman_buku, id_buku, qty,total,id_petugas)
                VALUES ('".$nomor['id_peminjaman_buku']."', '".$value['id_buku']."', '".$value['qty']."', '".$value['harga']*$value['qty']."', '".$value['id_petugas']."')");
                mysqli_query ($koneksi, "update petugas set saldo_petugas= saldo_petugas+'".$value['harga']*$value['qty']."' where id_petugas= '".$value['id_petugas']."' ");
            }

            $kosong = $_SESSION['saldo']-$total;
            mysqli_query ($koneksi, "update siswa set saldo='".$kosong."' where id_siswa= '".$_SESSION['id_siswa']."' ");
            unset($_SESSION['cart']);
            
            echo "<script>alert('Anda Berhasil Meminjam Buku');location.href='peminjaman.php'</script>";
        }
        else{
            echo "<script>alert('Gagal Meminjam Buku');location.href='cart.php'</script>";
        }
    }
?>
